<?php
namespace Hiberusb\Carrerob\Setup\Patch\Data;

use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\File\Csv;

class AddData implements DataPatchInterface
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    protected Csv $file;
    protected DirectoryList $dir;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        Csv $file
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->file = $file;
    }
    public function apply()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $directory = $objectManager->get('\Magento\Framework\Filesystem\DirectoryList');
        $pathApp=$directory->getPath('app');
        $filePath=$pathApp.'/code/Hiberusb/Carrerob/Setup/Patch/Data/import.csv';
        $data=$this->file->getData($filePath);
        $this->moduleDataSetup->startSetup();
       // $setup = $this->moduleDataSetup;

        foreach ($data as $key=>$row) {
            array_push($row,mt_rand(0*100,10*100)/100);
            $data[$key]=$row;
        }
        $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('hiberus_exam'),
            ['firstname', 'lastname', 'mark'],
            $data
        );
        $this->moduleDataSetup->endSetup();
    }
    public function getAliases()
    {
        return [];
    }
    public static function getDependencies()
    {
        return [];
    }
}

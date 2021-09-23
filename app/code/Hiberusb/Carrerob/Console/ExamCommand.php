<?php

namespace Hiberusb\Carrerob\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class ExamCommand extends Command
{

    const NAME = 'nombre';

    /**
     * @var \Hiberusb\Carrerob\Model\Carrerob
     */
    protected \Hiberusb\Carrerob\Model\Carrerob $alumno;

    /**
     * @param \Hiberusb\Carrerob\Model\Carrerob $alumno
     * @param string|null $name
     */
    public function __construct(
        \Hiberusb\Carrerob\Model\Carrerob $alumno,
        string                      $name = null
    )
    {
        $this->alumno = $alumno;
        parent::__construct($name);
    }

    protected function configure()
    {

        $this->setName('hiberus:carrero')
            ->setDescription('Mostrar listado examenes');
        parent::configure();

    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(
        InputInterface  $input,
        OutputInterface $output
    )
    {
        $collection = $this->alumno->getCollection();
        $alumnos=$collection->getData();
        foreach ($alumnos as $row) {
            $output->writeln('<info>'.$row['firstname'].' '.$row['lastname'].' '.$row['mark'].'</info>');
        }

    }

}

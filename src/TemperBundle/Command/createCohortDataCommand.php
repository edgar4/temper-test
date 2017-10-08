<?php
/**
 * Created by PhpStorm.
 * User: edgarchris
 * Date: 10/8/17
 * Time: 14:02
 */

namespace TemperBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class createCohortDataCommand extends ContainerAwareCommand
{

    private $csvParsingOptions = array(
        'finder_in' => 'app/Resources/data',
        'finder_name' => 'export.csv',
        'ignoreFirstLine' => true
    );

    protected function configure()
    {
        $this
            ->setName('temper:prepare:data')
            ->setDescription('reads data from csv file and uoloads to a database for easy analysis and query');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getEntityManager();
        $csv = $this->parseCSV();

        var_dump($csv);


        $output->writeln('<info>Data uploaded successfully</info>');
    }


    /**
     * @return array
     */

    private function parseCSV()
    {
        $ignoreFirstLine = $this->csvParsingOptions['ignoreFirstLine'];

        $finder = new  Finder();
        $finder->files()
            ->in($this->csvParsingOptions['finder_in'])
            ->name($this->csvParsingOptions['finder_name']);

        var_dump($finder);

        exit;
        foreach ($finder as $file) {
            $csv = $file;
        }

        $rows = array();
        if (($handle = fopen($csv->getRealPath(), "r")) !== FALSE) {
            $i = 0;
            while (($data = fgetcsv($handle, null, ";")) !== FALSE) {
                $i++;
                if ($ignoreFirstLine && $i == 1) {
                    continue;
                }
                $rows[] = $data;
            }
            fclose($handle);
        }

        return $rows;
    }

}
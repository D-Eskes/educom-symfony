<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Service\PoppodiumService;


class ImportSpreadsheetCommand extends Command
{   
    public function __construct(PoppodiumService $poppodiumService) {
        parent::__construct();
        $this->poppodiumService = $poppodiumService;
    }

    protected function configure()
    {
        $this
            ->setName('app:import-spreadsheet')
            ->setDescription('Import Excel Spreadsheet')
            ->setHelp('This command allows you to import a spreadsheet')
            ->addArgument('file', InputArgument::REQUIRED, 'Spreadsheet')
        ;   
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {   

        $inputFileName = $input->getArgument('file');
        $spreadsheet = IOFactory::load($inputFileName);
        $matrix = $spreadsheet->getSheet(0)->toArray();
        
        // echo var_dump($matrix);
        
        $keys = [
            "naam" => 0,
            "adres" => 0,
            "postcode" => 0,
            "woonplaats" => 0,
            "telefoonnummer" => 0,
            "email" => 0,
            "website" => 0,
            "afbeelding_url" => 0,              
        ];

        $headers = false;
        foreach ($matrix as $row) {
            // echo var_dump($row);

            $empty = empty(array_filter($row, function ($cell) {return $cell !== null;}));
            if ($empty) 
            {
                continue;
            }

            if (!$headers) 
            {
                $headers = true;
                foreach ($keys as $key => $value) 
                {
                    $value = array_search($key, $row);
                    $keys[$key] = $value;
                }
                // echo var_dump($keys);
                continue;
            }

            $data = array_combine(array_keys($keys), array_map(function($value) use ($row) {return ($row[$value]);}, $keys));
            
            // $data = [
            //     "naam" => $row[$keys["naam"]],
            //     "adres" => $row[$keys["adres"]],
            //     "postcode" => $row[$keys["postcode"]],
            //     "woonplaats" => $row[$keys["woonplaats"]],
            //     "telefoonnummer" => $row[$keys["telefoonnummer"]],
            //     "email" => $row[$keys["email"]],
            //     "website" => $row[$keys["website"]],
            //     "afbeelding_url" => $row[$keys["afbeelding_url"]],              
            // ];

            // echo var_dump($data);

            $this->poppodiumService->savePoppodium($data);

        }

        return Command::SUCCESS;
    } 
}
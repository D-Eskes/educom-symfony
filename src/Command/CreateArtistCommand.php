<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


use App\Service\ArtiestService;


class CreateArtistCommand extends Command
{
    private $artiestService;

    public function __construct(ArtiestService $artiestService) {
        parent::__construct();
        $this->artiestService = $artiestService;
    }

    protected function configure(): void
    {
        $this
            ->setName("app:artist:create")
            ->addArgument('naam', InputArgument::REQUIRED, 'Argument description')
            ->addArgument('genre', InputArgument::REQUIRED, 'Argument description')
            ->addArgument('omschrijving', InputArgument::REQUIRED, 'Argument description')
            ->addArgument('website', InputArgument::REQUIRED, 'Argument description')
            ->addArgument('afbeelding_url', InputArgument::REQUIRED, 'Argument description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        // $io = new SymfonyStyle($input, $output);

        $naam = $input->getArgument('naam');
        $genre = $input->getArgument('genre');
        $omschrijving = $input->getArgument('omschrijving');
        $website = $input->getArgument('website');
        $afbeelding_url = $input->getArgument('afbeelding_url');

        $data = [
            "naam" => $naam,
            "genre" => $genre,
            "omschrijving" => $omschrijving,
            "website" => $website,
            "afbeelding_url" => $afbeelding_url,              
        ];

        $this->artiestService->saveArtiest($data);

        return Command::SUCCESS;
    }
}

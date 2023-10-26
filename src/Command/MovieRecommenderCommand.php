<?php

namespace App\Command;


use App\Entity\Enum\RecommendationAlgorithm;
use App\Service\Recommender\RecommenderInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

#[AsCommand(name: 'app:find-movie')]
class MovieRecommenderCommand extends Command
{
    public function __construct(
        private readonly RecommenderInterface $movieRecommender
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->write("Welcome to movie recommender! \n");

        $recommendationAlgorithm = $this->getRecommendationAlgorithm($input, $output);
        $recommendations = $this->movieRecommender->recommend($recommendationAlgorithm);

        $output->write("Your movie recommendations are: \n");
        $output->write($recommendations, true);

        return Command::SUCCESS;
    }

    private function getRecommendationAlgorithm(InputInterface $input, OutputInterface $output): string
    {
        $helper = $this->getHelper('question');
        $recommendationAlgorithm = new ChoiceQuestion(
            "Please choose recommendation algorithm:",
            array_column(RecommendationAlgorithm::cases(), 'value'),
            RecommendationAlgorithm::RANDOM_RECOMMENDATION->value
        );
        $recommendationAlgorithm->setErrorMessage('Recommendation %s is invalid.');

        return $helper->ask($input, $output, $recommendationAlgorithm);
    }

}
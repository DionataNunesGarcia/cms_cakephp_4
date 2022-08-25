<?php
declare(strict_types=1);

namespace App\Command;

use App\Utils\ConvertDates;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\I18n\FrozenTime;

/**
 * ImportFiles command.
 */
class ImportFilesCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $response = [];
        $start = FrozenTime::now();
        $messageLog = "<strong>Comecando as:</strong> {$start}. <br/>";

        //build o path do file com o nome
        $file = WWW_ROOT . 'import/Posicoes-1128927-2018-01.csv';

        //Convert o file em array
        $csv = $this->readCSV($file);

        //remove first row, the header
        array_shift($csv);
        $total = 0;
        $totalSuccess = 0;
        $totalError = 0;
        $totalOn = 0;
        $totalOff = 0;
        foreach ($csv as $k => $data) {

            /** @var FrozenTime $dateTime */
            $dateTime = ConvertDates::convertDateTimeToFrozen($data[1]);


            debug($dateTime->diffForHumans(FrozenTime::now()));
            debug($dateTime);
            debug($data);

            die;

            $totalSuccess++;
        }
        die;

        //message de tempo
        $fim = Time::now();
        $messageLog .= "--------------------------------------------<br/>";
        $messageLog .= "<strong>Terminando as:</strong> {$fim}. <br/>";
        $dateInterval = $start->diff($fim);
        $messageLog .= "<strong>Tempo total de:</strong> {$dateInterval->h} "
            . "hora(s), {$dateInterval->m} minuto(s) e {$dateInterval->s} segundo(s). <br/>";

        //message de totais
        $messageLog .= "<strong>Total salvo com sucesso:</strong> $totalSuccess <br/>";
        $messageLog .= "<strong>Total salvo com erro:</strong> $totalError <br/>";
        $messageLog .= "<strong>Total de linhas válidas:</strong> $total <br/>";


        return $response;
    }


    public function readCSV($csvFile, $separated = ';')
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time','600');
        ini_set('max_allowed_packet','512MB');
        $csv = explode("\n", file_get_contents($csvFile));
        $csvArray = [];
        foreach ($csv as $key => $line) {
            $linhe = str_getcsv($line, $separated);
            $csvArray[$key] = $linhe;
        }
        return $csvArray;
    }
}

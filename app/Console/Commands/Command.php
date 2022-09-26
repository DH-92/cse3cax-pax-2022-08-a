<?php

namespace App\Console\Commands;

use Closure;
use Illuminate\Console\Command as BaseCommand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Helper\ProgressBar;

abstract class Command extends BaseCommand
{
    protected ?ProgressBar $progressBar = null;

    /**
     * Write a string as standard output.
     *
     * Modified to automatically clear and re-draw progress bars.
     *
     * @param string $string
     * @param string|null $style
     * @param int|string|null $verbosity
     *
     * @return void
     */
    public function line($string, $style = null, $verbosity = null)
    {
        if ($this->progressBar) {
            $this->progressBar->clear();
        }

        parent::line($string, $style, $verbosity);

        if ($this->progressBar) {
            $this->progressBar->display();
        }
    }

    /**
     * Execute a given callback while advancing a progress bar.
     *
     * Modified to store a reference to the current progress bar.
     *
     * @param iterable|int $totalSteps
     * @param Closure $callback
     *
     * @return mixed|void
     */
    public function withProgressBar($totalSteps, Closure $callback)
    {
        $oldProgressBar = $this->progressBar;

        $this->progressBar = $bar = $this->output->createProgressBar(
            is_iterable($totalSteps) ? count($totalSteps) : $totalSteps
        );

        $bar->start();

        if (is_iterable($totalSteps)) {
            foreach ($totalSteps as $value) {
                $callback($value, $bar);

                $bar->advance();
            }
        } else {
            $callback($bar);
        }

        $bar->finish();
        $this->newLine();

        $this->progressBar = $oldProgressBar;

        if (is_iterable($totalSteps)) {
            return $totalSteps;
        }
    }

    protected function validate(array $rules, array $messages = [], array $customAttributes = [])
    {
        $data = array_replace_recursive($this->options(), $this->arguments());

        try {
            Validator::validate($data, $rules, $messages, $customAttributes);
        } catch (ValidationException $exception) {
            foreach ($exception->errors() as $error) {
                $this->error($error);
            }

            return false;
        }

        return true;
    }
}

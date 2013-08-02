<?php

namespace GitElephant\Command;

use GitElephant\Command\BaseCommand;

/**
 * CloneCommand generator
 *
 * @author Matteo Giachino <matteog@gmail.com>
 */
class CloneCommand extends BaseCommand
{
    const GIT_CLONE_COMMAND = 'clone';

    /**
     * @return CloneCommand
     */
    static public function getInstance()
    {
        return new self();
    }

    /**
     * Command to clone a repository
     *
     * @param string $url repository url
     * @param string $to  where to clone the repo
     *
     * @return string command
     */
    public function cloneUrl($url, $to = null)
    {
        $this->clearAll();
        $this->addCommandName(static::GIT_CLONE_COMMAND);
        $this->addCommandSubject($url);
        if (null !== $to) {
            $this->addCommandSubject2($to);
        }

        return $this->getCommand();
    }
}

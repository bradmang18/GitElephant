<?php

namespace GitElephant\Command\Remote;

use GitElephant\Command\SubCommandCommand;

/**
 * Class AddRemoteCommand
 * 
 * remote subcommand generator for add
 *
 * @package GitElephant\Objects
 * @author  David Neimeyer <davidneimeyer@gmail.com>
 */

class AddSubCommand extends SubCommandCommand
{
    const GIT_REMOTE_ADD = 'add';
    const GIT_REMOTE_ADD_OPTION_FETCH = '-f';
    const GIT_REMOTE_ADD_OPTION_TAGS = '--tags';
    const GIT_REMOTE_ADD_OPTION_NOTAGS = '--no-tags';
    const GIT_REMOTE_ADD_OPTION_MIRROR = '--mirror';
    const GIT_REMOTE_ADD_OPTION_SETHEAD = '-m';
    const GIT_REMOTE_ADD_OPTION_TRACK = '-t';

    /**
     * Valid options for remote command that require an associated value
     *
     * @return array Array of all value-required options
     */
    public function addCmdValueOptions()
    {
        return array(
            self::GIT_REMOTE_ADD_OPTION_TRACK => self::GIT_REMOTE_ADD_OPTION_TRACK,
            self::GIT_REMOTE_ADD_OPTION_MIRROR => self::GIT_REMOTE_ADD_OPTION_MIRROR,
            self::GIT_REMOTE_ADD_OPTION_SETHEAD => self::GIT_REMOTE_ADD_OPTION_SETHEAD,
        );
    }

    /**
     * switch only options for the add subcommand
     *
     * @return array
     */
    public function addCmdSwitchOptions()
    {
        return array(
            self::GIT_REMOTE_ADD_OPTION_TAGS => self::GIT_REMOTE_ADD_OPTION_TAGS,
            self::GIT_REMOTE_ADD_OPTION_NOTAGS => self::GIT_REMOTE_ADD_OPTION_NOTAGS,
            self::GIT_REMOTE_ADD_OPTION_FETCH => self::GIT_REMOTE_ADD_OPTION_FETCH,
        );
    }

    /**
     * build add sub command
     *
     * @param string $name    remote name
     * @param string $url     URL of remote
     * @param array  $options options for the add subcommand
     *
     * @return string
     */
    public function prepare($name, $url, $options = array())
    {
        $options = $this->normalizeOptions(
            $options,
            $this->addCmdSwitchOptions(),
            $this->addCmdValueOptions()
        );

        $this->addCommandName(self::GIT_REMOTE_ADD);
        $this->addCommandSubject($name);
        $this->addCommandSubject($url);
        foreach ($options as $option) {
            $this->addCommandArgument($option);
        }

        return $this;
    }
}

<?php

namespace SimpleCalendar\plugin_deps;

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
class Google_Service_Drive_TeamDriveList extends \SimpleCalendar\plugin_deps\Google_Collection
{
    protected $collection_key = 'teamDrives';
    public $kind;
    public $nextPageToken;
    protected $teamDrivesType = 'SimpleCalendar\plugin_deps\Google_Service_Drive_TeamDrive';
    protected $teamDrivesDataType = 'array';
    public function setKind($kind)
    {
        $this->kind = $kind;
    }
    public function getKind()
    {
        return $this->kind;
    }
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
    /**
     * @param Google_Service_Drive_TeamDrive[]
     */
    public function setTeamDrives($teamDrives)
    {
        $this->teamDrives = $teamDrives;
    }
    /**
     * @return Google_Service_Drive_TeamDrive[]
     */
    public function getTeamDrives()
    {
        return $this->teamDrives;
    }
}

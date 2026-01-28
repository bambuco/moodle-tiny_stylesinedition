<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Dynamic styles for the Styles in Edition TinyMCE plugin.
 *
 * @package    tiny_stylesinedition
 * @copyright  2026 David Herney @ BambuCo
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('NO_MOODLE_COOKIES', true);

// Require_login is not needed here.
// phpcs:disable moodle.Files.RequireLogin.Missing
require('../../../../../config.php');

@header('Content-Disposition: inline; filename="styles.php"');
@header('Content-Type: text/css; charset=utf-8');

$csscontent = '';

$styles = get_config('tiny_stylesinedition', 'css');
if (!empty($styles)) {
    // We need to remove any script or other dangerous tags.
    echo strip_tags($styles) . "\n";
}

$scss = get_config('tiny_stylesinedition', 'scss');

if (!empty($scss)) {
    $compiler = new core_scss();
    echo $compiler->compile($scss);
}

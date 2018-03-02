<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\OwncloudPage;

require_once 'bootstrap.php';

/**
 * WebUIUser context.
 * Context for steps associated with the User logged in to the WebUI
 */
class WebUIUserContext extends RawMinkContext implements Context {
	
	/**
	 * 
	 * @var OwncloudPage
	 */
	private $owncloudPage;

	/**
	 * WebUIUserContext constructor.
	 *
	 * @param OwncloudPage $owncloudPage
	 */
	public function __construct(OwncloudPage $owncloudPage) {
		$this->owncloudPage = $owncloudPage;
	}
	
	/**
	 * @Then :displayname should be shown as the name of the current user in the WebUI
	 * 
	 * @param string $displayname
	 *
	 * @return void
	 */
	public function displayNameOfTheCurrentUserInTheWebUiShouldBe($displayname) {
		$actualUserName = $this->owncloudPage->getMyUsername();
		PHPUnit_Framework_Assert::assertSame(
			$displayname, $actualUserName,
			"displayed username should be '$displayname' but it is '$actualUserName'"
		);
	}
	
}
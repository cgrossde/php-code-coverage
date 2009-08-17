<?php
/**
 * PHP_CodeCoverage
 *
 * Copyright (c) 2009, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   PHP
 * @package    CodeCoverage
 * @subpackage Tests
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2009 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link       http://github.com/sebastianbergmann/php-code-coverage
 * @since      File available since Release 1.0.0
 */

require_once 'PHP/CodeCoverage/Util.php';

$path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
        '_files' . DIRECTORY_SEPARATOR;

require_once $path . 'CoverageClassExtendedTest.php';
require_once $path . 'CoverageClassTest.php';
require_once $path . 'CoverageMethodTest.php';
require_once $path . 'CoverageNotPrivateTest.php';
require_once $path . 'CoverageNotProtectedTest.php';
require_once $path . 'CoverageNotPublicTest.php';
require_once $path . 'CoveragePrivateTest.php';
require_once $path . 'CoverageProtectedTest.php';
require_once $path . 'CoveragePublicTest.php';
require_once $path . 'CoveredClass.php';

unset($path);

/**
 * Tests for the PHP_CodeCoverage_Util class.
 *
 * @category   PHP
 * @package    CodeCoverage
 * @subpackage Tests
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2009 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: @package_version@
 * @link       http://github.com/sebastianbergmann/php-code-coverage
 * @since      Class available since Release 1.0.0
 */
class PHP_CodeCoverage_UtilTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            array_merge(range(19, 36), range(2, 17))
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageClassExtendedTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered2()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            range(19, 36)
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageClassTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered3()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            range(31, 35)
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageMethodTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered4()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            array_merge(range(25, 29), range(31, 35))
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageNotPrivateTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered5()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            array_merge(range(21, 23), range(31, 35))
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageNotProtectedTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered6()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            array_merge(range(21, 23), range(25, 29))
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageNotPublicTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered7()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            range(21, 23)
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoveragePrivateTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered8()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            range(25, 29)
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoverageProtectedTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeCovered
     * @covers PHP_CodeCoverage_Util::resolveCoversToReflectionObjects
     */
    public function testGetLinesToBeCovered9()
    {
        $this->assertEquals(
          array(
            '/usr/local/src/code-coverage/Tests/_files/CoveredClass.php' =>
            range(31, 35)
          ),
          PHP_CodeCoverage_Util::getLinesToBeCovered(
            'CoveragePublicTest', 'testPublicMethod'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeIgnored
     */
    public function testGetLinesToBeIgnored()
    {
        $this->assertEquals(
          array(3, 4, 5),
          PHP_CodeCoverage_Util::getLinesToBeIgnored(
            dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
            '_files' . DIRECTORY_SEPARATOR . 'source_with_ignore.php'
          )
        );
    }

    /**
     * @covers PHP_CodeCoverage_Util::getLinesToBeIgnored
     */
    public function testGetLinesToBeIgnored2()
    {
        $this->assertEquals(
          array(),
          PHP_CodeCoverage_Util::getLinesToBeIgnored(
            dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
            '_files' . DIRECTORY_SEPARATOR . 'source_without_ignore.php'
          )
        );
    }
}
?>
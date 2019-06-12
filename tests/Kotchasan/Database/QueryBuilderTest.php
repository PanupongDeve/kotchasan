<?php

namespace Kotchasan\Database;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2019-06-05 at 21:45:04.
 */
class QueryBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var QueryBuilder
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $driver = new PdoMysqlDriver;
        $this->object = $driver->createQuery();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * Generated from @assert where(array('U.id', 1))->andWhere(array())->text() [==] " WHERE U.`id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::andWhere
     */
    public function testAndWhere()
    {

        $this->assertEquals(
          " WHERE U.`id` = 1",
          $this->object->where(array('U.id', 1))->andWhere(array())->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', 1))->andWhere(array('U.id', 2))->text() [==] " WHERE (U.`id` = 1) AND (U.`id` = 2)".
     *
     * @covers Kotchasan\Database\QueryBuilder::andWhere
     */
    public function testAndWhere2()
    {

        $this->assertEquals(
          " WHERE (U.`id` = 1) AND (U.`id` = 2)",
          $this->object->where(array('U.id', 1))->andWhere(array('U.id', 2))->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', 1))->andWhere(array(Sql::BETWEEN('id', 0, 1), Sql::BETWEEN('id', 0, 1)), 'OR')->text() [==] " WHERE (U.`id` = 1) AND (`id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1)".
     *
     * @covers Kotchasan\Database\QueryBuilder::andWhere
     */
    public function testAndWhere3()
    {

        $this->assertEquals(
          " WHERE (U.`id` = 1) AND (`id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1)",
          $this->object->where(array('U.id', 1))->andWhere(array(Sql::BETWEEN('id', 0, 1), Sql::BETWEEN('id', 0, 1)), 'OR')->text()
        );
    }

    /**
     * Generated from @assert delete('user', array(array('id', 1), array('name', 'test')))->text() [==] "DELETE FROM `user` WHERE `id` = 1 AND `name` = 'test'".
     *
     * @covers Kotchasan\Database\QueryBuilder::delete
     */
    public function testDelete()
    {

        $this->assertEquals(
          "DELETE FROM `user` WHERE `id` = 1 AND `name` = 'test'",
          $this->object->delete('user', array(array('id', 1), array('name', 'test')))->text()
        );
    }

    /**
     * Generated from @assert select()->from('user U')->exists('useronline', array('member_id', 'U.id'))->text() [==] 'SELECT * FROM `user` AS U WHERE  EXISTS (SELECT * FROM `useronline` WHERE `member_id` = U.`id`)'.
     *
     * @covers Kotchasan\Database\QueryBuilder::exists
     */
    public function testExists()
    {

        $this->assertEquals(
          'SELECT * FROM `user` AS U WHERE  EXISTS (SELECT * FROM `useronline` WHERE `member_id` = U.`id`)',
          $this->object->select()->from('user U')->exists('useronline', array('member_id', 'U.id'))->text()
        );
    }

    /**
     * Generated from @assert select()->from('user U')->where(array('U.id', 1))->exists('useronline', array('member_id', 'U.id'))->text() [==] 'SELECT * FROM `user` AS U WHERE U.`id` = 1 AND EXISTS (SELECT * FROM `useronline` WHERE `member_id` = U.`id`)'.
     *
     * @covers Kotchasan\Database\QueryBuilder::exists
     */
    public function testExists2()
    {

        $this->assertEquals(
          'SELECT * FROM `user` AS U WHERE U.`id` = 1 AND EXISTS (SELECT * FROM `useronline` WHERE `member_id` = U.`id`)',
          $this->object->select()->from('user U')->where(array('U.id', 1))->exists('useronline', array('member_id', 'U.id'))->text()
        );
    }

    /**
     * Generated from @assert select()->from('user')->text() [==] "SELECT * FROM `user`".
     *
     * @covers Kotchasan\Database\QueryBuilder::from
     */
    public function testFrom()
    {

        $this->assertEquals(
          "SELECT * FROM `user`",
          $this->object->select()->from('user')->text()
        );
    }

    /**
     * Generated from @assert select()->from('user a', 'user b')->text() [==] "SELECT * FROM `user` AS `a`, `user` AS `b`".
     *
     * @covers Kotchasan\Database\QueryBuilder::from
     */
    public function testFrom2()
    {

        $this->assertEquals(
          "SELECT * FROM `user` AS `a`, `user` AS `b`",
          $this->object->select()->from('user a', 'user b')->text()
        );
    }

    /**
     * Generated from @assert select()->from('user')->groupBy('MONTH(`date`)', 'YEAR(`date`)')->text() [==] 'SELECT * FROM `user` GROUP BY MONTH(`date`), YEAR(`date`)'.
     *
     * @covers Kotchasan\Database\QueryBuilder::groupBy
     */
    public function testGroupBy()
    {

        $this->assertEquals(
          'SELECT * FROM `user` GROUP BY MONTH(`date`), YEAR(`date`)',
          $this->object->select()->from('user')->groupBy('MONTH(`date`)', 'YEAR(`date`)')->text()
        );
    }

    /**
     * Generated from @assert select()->from('user')->groupBy('U.id')->text() [==] 'SELECT * FROM `user` GROUP BY U.`id`'.
     *
     * @covers Kotchasan\Database\QueryBuilder::groupBy
     */
    public function testGroupBy2()
    {

        $this->assertEquals(
          'SELECT * FROM `user` GROUP BY U.`id`',
          $this->object->select()->from('user')->groupBy('U.id')->text()
        );
    }

    /**
     * Generated from @assert select()->from('user')->groupBy(array('id', 'username'))->text() [==] 'SELECT * FROM `user` GROUP BY `id`, `username`'.
     *
     * @covers Kotchasan\Database\QueryBuilder::groupBy
     */
    public function testGroupBy3()
    {

        $this->assertEquals(
          'SELECT * FROM `user` GROUP BY `id`, `username`',
          $this->object->select()->from('user')->groupBy(array('id', 'username'))->text()
        );
    }

    /**
     * Generated from @assert insert('user', array('id' => 1, 'name' => 'test'))->text() [==] "INSERT INTO `user` (`id`, `name`) VALUES (1, 'test')".
     *
     * @covers Kotchasan\Database\QueryBuilder::insert
     */
    public function testInsert()
    {

        $this->assertEquals(
          "INSERT INTO `user` (`id`, `name`) VALUES (1, 'test')",
          $this->object->insert('user', array('id' => 1, 'name' => 'test'))->text()
        );
    }

    /**
     * Generated from @assert insertOrUpdate('user', array('id' => 1, 'name' => 'test'))->text() [==] "INSERT INTO `user` (`id`, `name`) VALUES (1, 'test') ON DUPLICATE KEY UPDATE `id`=VALUES(`id`), `name`=VALUES(`name`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::insertOrUpdate
     */
    public function testInsertOrUpdate()
    {

        $this->assertEquals(
          "INSERT INTO `user` (`id`, `name`) VALUES (1, 'test') ON DUPLICATE KEY UPDATE `id`=VALUES(`id`), `name`=VALUES(`name`)",
          $this->object->insertOrUpdate('user', array('id' => 1, 'name' => 'test'))->text()
        );
    }

    /**
     * Generated from @assert join('user U', 'INNER', 1)->text() [==] " INNER JOIN `user` AS U ON `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::join
     */
    public function testJoin()
    {

        $this->assertEquals(
          " INNER JOIN `user` AS U ON `id` = 1",
          $this->object->join('user U', 'INNER', 1)->text()
        );
    }

    /**
     * Generated from @assert join('user U', 'INNER', array('U.id', 'A.id'))->text() [==] " INNER JOIN `user` AS U ON U.`id` = A.`id`".
     *
     * @covers Kotchasan\Database\QueryBuilder::join
     */
    public function testJoin2()
    {

        $this->assertEquals(
          " INNER JOIN `user` AS U ON U.`id` = A.`id`",
          $this->object->join('user U', 'INNER', array('U.id', 'A.id'))->text()
        );
    }

    /**
     * Generated from @assert join('user U', 'INNER', array('U.id', '=', 'A.id'))->text() [==] " INNER JOIN `user` AS U ON U.`id` = A.`id`".
     *
     * @covers Kotchasan\Database\QueryBuilder::join
     */
    public function testJoin3()
    {

        $this->assertEquals(
          " INNER JOIN `user` AS U ON U.`id` = A.`id`",
          $this->object->join('user U', 'INNER', array('U.id', '=', 'A.id'))->text()
        );
    }

    /**
     * Generated from @assert join('user U', 'INNER', array('id', '=', 1))->text() [==] " INNER JOIN `user` AS U ON `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::join
     */
    public function testJoin4()
    {

        $this->assertEquals(
          " INNER JOIN `user` AS U ON `id` = 1",
          $this->object->join('user U', 'INNER', array('id', '=', 1))->text()
        );
    }

    /**
     * Generated from @assert join('user U', 'INNER', array(array('U.id', 'A.id'), array('U.id', 'A.id')))->text() [==] " INNER JOIN `user` AS U ON U.`id` = A.`id` AND U.`id` = A.`id`".
     *
     * @covers Kotchasan\Database\QueryBuilder::join
     */
    public function testJoin5()
    {

        $this->assertEquals(
          " INNER JOIN `user` AS U ON U.`id` = A.`id` AND U.`id` = A.`id`",
          $this->object->join('user U', 'INNER', array(array('U.id', 'A.id'), array('U.id', 'A.id')))->text()
        );
    }

    /**
     * Generated from @assert limit(10)->text() [==] " LIMIT 10".
     *
     * @covers Kotchasan\Database\QueryBuilder::limit
     */
    public function testLimit()
    {

        $this->assertEquals(
          " LIMIT 10",
          $this->object->limit(10)->text()
        );
    }

    /**
     * Generated from @assert limit(10, 1)->text() [==] " LIMIT 1,10".
     *
     * @covers Kotchasan\Database\QueryBuilder::limit
     */
    public function testLimit2()
    {

        $this->assertEquals(
          " LIMIT 1,10",
          $this->object->limit(10, 1)->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', 1))->orWhere(array())->text() [==] " WHERE U.`id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::orWhere
     */
    public function testOrWhere()
    {

        $this->assertEquals(
          " WHERE U.`id` = 1",
          $this->object->where(array('U.id', 1))->orWhere(array())->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', 1))->orWhere(array('U.id', 2))->text() [==] " WHERE (U.`id` = 1) OR (U.`id` = 2)".
     *
     * @covers Kotchasan\Database\QueryBuilder::orWhere
     */
    public function testOrWhere2()
    {

        $this->assertEquals(
          " WHERE (U.`id` = 1) OR (U.`id` = 2)",
          $this->object->where(array('U.id', 1))->orWhere(array('U.id', 2))->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', 1))->orWhere(array(Sql::BETWEEN('id', 0, 1), Sql::BETWEEN('id', 0, 1)), 'OR')->text() [==] " WHERE (U.`id` = 1) OR (`id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1)".
     *
     * @covers Kotchasan\Database\QueryBuilder::orWhere
     */
    public function testOrWhere3()
    {

        $this->assertEquals(
          " WHERE (U.`id` = 1) OR (`id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1)",
          $this->object->where(array('U.id', 1))->orWhere(array(Sql::BETWEEN('id', 0, 1), Sql::BETWEEN('id', 0, 1)), 'OR')->text()
        );
    }

    /**
     * Generated from @assert order('id', 'id ASC')->text() [==] " ORDER BY `id`, `id` ASC".
     *
     * @covers Kotchasan\Database\QueryBuilder::order
     */
    public function testOrder()
    {

        $this->assertEquals(
          " ORDER BY `id`, `id` ASC",
          $this->object->order('id', 'id ASC')->text()
        );
    }

    /**
     * Generated from @assert order('id ASC')->text() [==] " ORDER BY `id` ASC".
     *
     * @covers Kotchasan\Database\QueryBuilder::order
     */
    public function testOrder2()
    {

        $this->assertEquals(
          " ORDER BY `id` ASC",
          $this->object->order('id ASC')->text()
        );
    }

    /**
     * Generated from @assert order('user.id DESC')->text() [==] " ORDER BY `user`.`id` DESC".
     *
     * @covers Kotchasan\Database\QueryBuilder::order
     */
    public function testOrder3()
    {

        $this->assertEquals(
          " ORDER BY `user`.`id` DESC",
          $this->object->order('user.id DESC')->text()
        );
    }

    /**
     * Generated from @assert order('id ASCD')->text() [==] "".
     *
     * @covers Kotchasan\Database\QueryBuilder::order
     */
    public function testOrder4()
    {

        $this->assertEquals(
          "",
          $this->object->order('id ASCD')->text()
        );
    }

    /**
     * Generated from @assert select('U.id', 'email name', 'module')->text() [==] "SELECT U.`id`,`email` AS `name`,`module`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect()
    {

        $this->assertEquals(
          "SELECT U.`id`,`email` AS `name`,`module`",
          $this->object->select('U.id', 'email name', 'module')->text()
        );
    }

    /**
     * Generated from @assert select('"email" name', '0 id', '0 `ไอดี`')->text() [==] "SELECT 'email' AS `name`,0 AS `id`,0 AS `ไอดี`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect2()
    {

        $this->assertEquals(
          "SELECT 'email' AS `name`,0 AS `id`,0 AS `ไอดี`",
          $this->object->select('"email" name', '0 id', '0 `ไอดี`')->text()
        );
    }

    /**
     * Generated from @assert select("'email' name", '0 AS id', '0 AS ไอดี')->text() [==] "SELECT 'email' AS `name`,0 AS `id`,0 AS `ไอดี`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect3()
    {

        $this->assertEquals(
          "SELECT 'email' AS `name`,0 AS `id`,0 AS `ไอดี`",
          $this->object->select("'email' name", '0 AS id', '0 AS ไอดี')->text()
        );
    }

    /**
     * Generated from @assert select()->text()  [==] "SELECT *".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect4()
    {

        $this->assertEquals(
          "SELECT *",
          $this->object->select()->text()
        );
    }

    /**
     * Generated from @assert select()->where(array('domain', Sql::strValue('kotchasan.com')))->text() [==] "SELECT * WHERE `domain` = 'kotchasan.com'".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect5()
    {

        $this->assertEquals(
          "SELECT * WHERE `domain` = 'kotchasan.com'",
          $this->object->select()->where(array('domain', Sql::strValue('kotchasan.com')))->text()
        );
    }

    /**
     * Generated from @assert select('name `ชื่อ นามสกุล`', 'U.`idcard` AS `เลขประชาชน`')->text() [==] "SELECT `name` AS `ชื่อ นามสกุล`,U.`idcard` AS `เลขประชาชน`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect6()
    {

        $this->assertEquals(
          "SELECT `name` AS `ชื่อ นามสกุล`,U.`idcard` AS `เลขประชาชน`",
          $this->object->select('name `ชื่อ นามสกุล`', 'U.`idcard` AS `เลขประชาชน`')->text()
        );
    }

    /**
     * Generated from @assert select('table.field', '`table`.`field`')->text() [==] "SELECT `table`.`field`,`table`.`field`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect7()
    {

        $this->assertEquals(
          "SELECT `table`.`field`,`table`.`field`",
          $this->object->select('table.field', '`table`.`field`')->text()
        );
    }

    /**
     * Generated from @assert select('table.field field', '`table`.`field` `field`')->text() [==] "SELECT `table`.`field` AS `field`,`table`.`field` AS `field`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect8()
    {

        $this->assertEquals(
          "SELECT `table`.`field` AS `field`,`table`.`field` AS `field`",
          $this->object->select('table.field field', '`table`.`field` `field`')->text()
        );
    }

    /**
     * Generated from @assert select('table.field AS field', '`table`.`field` AS `field`')->text() [==] "SELECT `table`.`field` AS `field`,`table`.`field` AS `field`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect9()
    {

        $this->assertEquals(
          "SELECT `table`.`field` AS `field`,`table`.`field` AS `field`",
          $this->object->select('table.field AS field', '`table`.`field` AS `field`')->text()
        );
    }

    /**
     * Generated from @assert select('U.field', 'U1.`field`', 'NULL id')->text() [==] "SELECT U.`field`,U1.`field`,NULL AS `id`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect10()
    {

        $this->assertEquals(
          "SELECT U.`field`,U1.`field`,NULL AS `id`",
          $this->object->select('U.field', 'U1.`field`', 'NULL id')->text()
        );
    }

    /**
     * Generated from @assert select('U.field field', 'U1.`field` `field`')->text() [==] "SELECT U.`field` AS `field`,U1.`field` AS `field`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect11()
    {

        $this->assertEquals(
          "SELECT U.`field` AS `field`,U1.`field` AS `field`",
          $this->object->select('U.field field', 'U1.`field` `field`')->text()
        );
    }

    /**
     * Generated from @assert select('U.field AS field', 'U1.`field` AS `field`')->text() [==] "SELECT U.`field` AS `field`,U1.`field` AS `field`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect12()
    {

        $this->assertEquals(
          "SELECT U.`field` AS `field`,U1.`field` AS `field`",
          $this->object->select('U.field AS field', 'U1.`field` AS `field`')->text()
        );
    }

    /**
     * Generated from @assert select(Sql::YEAR('create_date', 'year'), Sql::MONTH('create_date', 'month'))->text() [==] "SELECT YEAR(`create_date`) AS `year`,MONTH(`create_date`) AS `month`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect13()
    {

        $this->assertEquals(
          "SELECT YEAR(`create_date`) AS `year`,MONTH(`create_date`) AS `month`",
          $this->object->select(Sql::YEAR('create_date', 'year'), Sql::MONTH('create_date', 'month'))->text()
        );
    }

    /**
     * Generated from @assert select(array(Sql::YEAR('create_date', 'year'), Sql::MONTH('create_date', 'month')))->text() [==] "SELECT YEAR(`create_date`) AS `year`,MONTH(`create_date`) AS `month`".
     *
     * @covers Kotchasan\Database\QueryBuilder::select
     */
    public function testSelect14()
    {

        $this->assertEquals(
          "SELECT YEAR(`create_date`) AS `year`,MONTH(`create_date`) AS `month`",
          $this->object->select(array(Sql::YEAR('create_date', 'year'), Sql::MONTH('create_date', 'month')))->text()
        );
    }

    /**
     * Generated from @assert selectCount()->from('user')->text() [==] "SELECT COUNT(*) AS `count` FROM `user`".
     *
     * @covers Kotchasan\Database\QueryBuilder::selectCount
     */
    public function testSelectCount()
    {

        $this->assertEquals(
          "SELECT COUNT(*) AS `count` FROM `user`",
          $this->object->selectCount()->from('user')->text()
        );
    }

    /**
     * Generated from @assert selectCount('id ids')->from('user')->text() [==] "SELECT COUNT(`id`) AS `ids` FROM `user`".
     *
     * @covers Kotchasan\Database\QueryBuilder::selectCount
     */
    public function testSelectCount2()
    {

        $this->assertEquals(
          "SELECT COUNT(`id`) AS `ids` FROM `user`",
          $this->object->selectCount('id ids')->from('user')->text()
        );
    }

    /**
     * Generated from @assert selectCount('id ids', 'field alias')->from('user')->text() [==] "SELECT COUNT(`id`) AS `ids`, COUNT(`field`) AS `alias` FROM `user`".
     *
     * @covers Kotchasan\Database\QueryBuilder::selectCount
     */
    public function testSelectCount3()
    {

        $this->assertEquals(
          "SELECT COUNT(`id`) AS `ids`, COUNT(`field`) AS `alias` FROM `user`",
          $this->object->selectCount('id ids', 'field alias')->from('user')->text()
        );
    }

    /**
     * Generated from @assert selectDistinct('id')->from('user')->text() [==] "SELECT DISTINCT `id` FROM `user`".
     *
     * @covers Kotchasan\Database\QueryBuilder::selectDistinct
     */
    public function testSelectDistinct()
    {

        $this->assertEquals(
          "SELECT DISTINCT `id` FROM `user`",
          $this->object->selectDistinct('id')->from('user')->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('key1' => 'value1', 'key2' => 2))->where(1)->text() [==] "UPDATE `user` SET `key1`=:Skey1, `key2`=:Skey2 WHERE `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet()
    {

        $this->assertEquals(
          "UPDATE `user` SET `key1`=:Skey1, `key2`=:Skey2 WHERE `id` = 1",
          $this->object->update('user')->set(array('key1' => 'value1', 'key2' => 2))->where(1)->text()
        );
    }

    /**
     * Generated from @assert update('user U')->set(array('U.key1' => 'value1', 'U.key2' => 2))->where(array('U.id', 1))->text() [==] "UPDATE `user` AS U SET U.`key1`=:SUkey1, U.`key2`=:SUkey2 WHERE U.`id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet2()
    {

        $this->assertEquals(
          "UPDATE `user` AS U SET U.`key1`=:SUkey1, U.`key2`=:SUkey2 WHERE U.`id` = 1",
          $this->object->update('user U')->set(array('U.key1' => 'value1', 'U.key2' => 2))->where(array('U.id', 1))->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('key1' => '(...)'))->text() [==] "UPDATE `user` SET `key1`=(...)".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet3()
    {

        $this->assertEquals(
          "UPDATE `user` SET `key1`=(...)",
          $this->object->update('user')->set(array('key1' => '(...)'))->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('key1' => 'test (...)'))->text() [==] "UPDATE `user` SET `key1`=:Skey1".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet4()
    {

        $this->assertEquals(
          "UPDATE `user` SET `key1`=:Skey1",
          $this->object->update('user')->set(array('key1' => 'test (...)'))->text()
        );
    }

    /**
     * Generated from @assert update('user')->set('`reply`=`reply`+1')->text() [==] "UPDATE `user` SET `reply`=`reply`+1".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet5()
    {

        $this->assertEquals(
          "UPDATE `user` SET `reply`=`reply`+1",
          $this->object->update('user')->set('`reply`=`reply`+1')->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('id' => 1, '`reply`=`reply`+1'))->text() [==] "UPDATE `user` SET `id`=:Sid, `reply`=`reply`+1".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet6()
    {

        $this->assertEquals(
          "UPDATE `user` SET `id`=:Sid, `reply`=`reply`+1",
          $this->object->update('user')->set(array('id' => 1, '`reply`=`reply`+1'))->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('create_date' => Sql::NOW()))->text() [==] "UPDATE `user` SET `create_date`=NOW()".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet7()
    {

        $this->assertEquals(
          "UPDATE `user` SET `create_date`=NOW()",
          $this->object->update('user')->set(array('create_date' => Sql::NOW()))->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('create_date' => Sql::create('SELECT * FROM `a`')))->text() [==] "UPDATE `user` SET `create_date`=SELECT * FROM `a`".
     *
     * @covers Kotchasan\Database\QueryBuilder::set
     */
    public function testSet8()
    {

        $this->assertEquals(
          "UPDATE `user` SET `create_date`=SELECT * FROM `a`",
          $this->object->update('user')->set(array('create_date' => Sql::create('SELECT * FROM `a`')))->text()
        );
    }

    /**
     * Generated from @assert (Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`'))->text() [==] "(SELECT * FROM `a`) UNION (SELECT * FROM `b`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::union
     */
    public function testUnion()
    {

        $this->assertEquals(
          "(SELECT * FROM `a`) UNION (SELECT * FROM `b`)",
          $this->object->union(Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`'))->text()
        );
    }

    /**
     * Generated from @assert (array(Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`')))->text() [==] "(SELECT * FROM `a`) UNION (SELECT * FROM `b`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::union
     */
    public function testUnion2()
    {

        $this->assertEquals(
          "(SELECT * FROM `a`) UNION (SELECT * FROM `b`)",
          $this->object->union(array(Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`')))->text()
        );
    }

    /**
     * Generated from @assert (Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`'))->text() [==] "(SELECT * FROM `a`) UNION ALL (SELECT * FROM `b`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::unionAll
     */
    public function testUnionAll()
    {

        $this->assertEquals(
          "(SELECT * FROM `a`) UNION ALL (SELECT * FROM `b`)",
          $this->object->unionAll(Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`'))->text()
        );
    }

    /**
     * Generated from @assert (array(Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`')))->text() [==] "(SELECT * FROM `a`) UNION ALL (SELECT * FROM `b`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::unionAll
     */
    public function testUnionAll2()
    {

        $this->assertEquals(
          "(SELECT * FROM `a`) UNION ALL (SELECT * FROM `b`)",
          $this->object->unionAll(array(Sql::create('SELECT * FROM `a`'), Sql::create('SELECT * FROM `b`')))->text()
        );
    }

    /**
     * Generated from @assert update('user')->set(array('key1'=>'value1', 'key2'=>2))->where(array(array('id', 1), array('id', 1)))->text() [==] "UPDATE `user` SET `key1`=:Skey1, `key2`=:Skey2 WHERE `id` = 1 AND `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::update
     */
    public function testUpdate()
    {

        $this->assertEquals(
          "UPDATE `user` SET `key1`=:Skey1, `key2`=:Skey2 WHERE `id` = 1 AND `id` = 1",
          $this->object->update('user')->set(array('key1' => 'value1', 'key2' => 2))->where(array(array('id', 1), array('id', 1)))->text()
        );
    }

    /**
     * Generated from @assert where(array())->text() [==] "".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere()
    {

        $this->assertEquals(
          "",
          $this->object->where(array())->text()
        );
    }

    /**
     * Generated from @assert where(1)->text() [==] " WHERE `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere2()
    {

        $this->assertEquals(
          " WHERE `id` = 1",
          $this->object->where(1)->text()
        );
    }

    /**
     * Generated from @assert where(array('id', 1))->text() [==] " WHERE `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere3()
    {

        $this->assertEquals(
          " WHERE `id` = 1",
          $this->object->where(array('id', 1))->text()
        );
    }

    /**
     * Generated from @assert where(array('id', '1'))->text() [==] " WHERE `id` = '1'".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere4()
    {

        $this->assertEquals(
          " WHERE `id` = '1'",
          $this->object->where(array('id', '1'))->text()
        );
    }

    /**
     * Generated from @assert where(array('domain', 'domain.tld'))->text() [==] " WHERE `domain` = 'domain.tld'".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere5()
    {

        $this->assertEquals(
          " WHERE `domain` = 'domain.tld'",
          $this->object->where(array('domain', 'domain.tld'))->text()
        );
    }

    /**
     * Generated from @assert where(array(1, 1))->text() [==] " WHERE 1 = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere6()
    {

        $this->assertEquals(
          " WHERE 1 = 1",
          $this->object->where(array(1, 1))->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', 'G.id'))->text() [==] " WHERE U.`id` = G.`id`".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere7()
    {

        $this->assertEquals(
          " WHERE U.`id` = G.`id`",
          $this->object->where(array('U.id', 'G.id'))->text()
        );
    }

    /**
     * Generated from @assert where(array('date', '2016-1-1 30:30'))->text() [==] " WHERE `date` = '2016-1-1 30:30'".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere8()
    {

        $this->assertEquals(
          " WHERE `date` = '2016-1-1 30:30'",
          $this->object->where(array('date', '2016-1-1 30:30'))->text()
        );
    }

    /**
     * Generated from @assert where(array('id', '=', 1))->text() [==] " WHERE `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere9()
    {

        $this->assertEquals(
          " WHERE `id` = 1",
          $this->object->where(array('id', '=', 1))->text()
        );
    }

    /**
     * Generated from @assert where(Sql::create('`id`=1 OR (SELECT ....)'))->text() [==] " WHERE `id`=1 OR (SELECT ....)".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere10()
    {

        $this->assertEquals(
          " WHERE `id`=1 OR (SELECT ....)",
          $this->object->where(Sql::create('`id`=1 OR (SELECT ....)'))->text()
        );
    }

    /**
     * Generated from @assert where(array('id', '=', 1))->text() [==] " WHERE `id` = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere11()
    {

        $this->assertEquals(
          " WHERE `id` = 1",
          $this->object->where(array('id', '=', 1))->text()
        );
    }

    /**
     * Generated from @assert where(array('id', 'IN', array(1, 2, '3')))->text() [==] " WHERE `id` IN (1, 2, '3')".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere12()
    {

        $this->assertEquals(
          " WHERE `id` IN (1, 2, '3')",
          $this->object->where(array('id', 'IN', array(1, 2, '3')))->text()
        );
    }

    /**
     * Generated from @assert where(array(array('social', '0'), Sql::create('(...)')))->text() [==] " WHERE `social` = '0' AND (...)".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere13()
    {

        $this->assertEquals(
          " WHERE `social` = '0' AND (...)",
          $this->object->where(array(array('social', '0'), Sql::create('(...)')))->text()
        );
    }

    /**
     * Generated from @assert where(array(array(Sql::MONTH('create_date'), 1), array(Sql::YEAR('create_date'), 1)))->text() [==] " WHERE MONTH(`create_date`) = 1 AND YEAR(`create_date`) = 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere14()
    {

        $this->assertEquals(
          " WHERE MONTH(`create_date`) = 1 AND YEAR(`create_date`) = 1",
          $this->object->where(array(array(Sql::MONTH('create_date'), 1), array(Sql::YEAR('create_date'), 1)))->text()
        );
    }

    /**
     * Generated from @assert where(array(array('id', array(1, 'a')), array('id', array('G.id', 'G.`id2`'))))->text() [==] " WHERE `id` IN (1, 'a') AND `id` IN (G.`id`, G.`id2`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere15()
    {

        $this->assertEquals(
          " WHERE `id` IN (1, 'a') AND `id` IN (G.`id`, G.`id2`)",
          $this->object->where(array(array('id', array(1, 'a')), array('id', array('G.id', 'G.`id2`'))))->text()
        );
    }

    /**
     * Generated from @assert where(array(array('id', array(1, 'a')), array('id', array('', 'th'))))->text() [==] " WHERE `id` IN (1, 'a') AND `id` IN ('', 'th')".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere16()
    {

        $this->assertEquals(
          " WHERE `id` IN (1, 'a') AND `id` IN ('', 'th')",
          $this->object->where(array(array('id', array(1, 'a')), array('id', array('', 'th'))))->text()
        );
    }

    /**
     * Generated from @assert where(array('ip', 'NOT IN', array('', '192.168.1.104')))->text() [==] " WHERE `ip` NOT IN ('', '192.168.1.104')".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere17()
    {

        $this->assertEquals(
          " WHERE `ip` NOT IN ('', '192.168.1.104')",
          $this->object->where(array('ip', 'NOT IN', array('', '192.168.1.104')))->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', '(SELECT CASE END)'))->text() [==] " WHERE U.`id` = '(SELECT CASE END)'".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere18()
    {

        $this->assertEquals(
          " WHERE U.`id` = '(SELECT CASE END)'",
          $this->object->where(array('U.id', '(SELECT CASE END)'))->text()
        );
    }

    /**
     * Generated from @assert where(array(array(Sql::YEAR('create_date'), Sql::YEAR('S.`create_date`'))))->text() [==] " WHERE YEAR(`create_date`) = YEAR(S.`create_date`)".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere19()
    {

        $this->assertEquals(
          " WHERE YEAR(`create_date`) = YEAR(S.`create_date`)",
          $this->object->where(array(array(Sql::YEAR('create_date'), Sql::YEAR('S.`create_date`'))))->text()
        );
    }

    /**
     * Generated from @assert where(array('U.id', Sql::strValue('G.id')))->text() [==] " WHERE U.`id` = 'G.id'".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere20()
    {

        $this->assertEquals(
          " WHERE U.`id` = 'G.id'",
          $this->object->where(array('U.id', Sql::strValue('G.id')))->text()
        );
    }

    /**
     * Generated from @assert where(Sql::ISNULL('U.id'))->text() [==] " WHERE U.`id` IS NULL".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere21()
    {

        $this->assertEquals(
          " WHERE U.`id` IS NULL",
          $this->object->where(Sql::ISNULL('U.id'))->text()
        );
    }

    /**
     * Generated from @assert where(array(array('create_date', 'A'), Sql::BETWEEN('id', 'ทดสอบ', 'ทดสอบ')))->text() [==] " WHERE `create_date` = 'A' AND `id` BETWEEN 'ทดสอบ' AND 'ทดสอบ'".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere22()
    {

        $this->assertEquals(
          " WHERE `create_date` = 'A' AND `id` BETWEEN 'ทดสอบ' AND 'ทดสอบ'",
          $this->object->where(array(array('create_date', 'A'), Sql::BETWEEN('id', 'ทดสอบ', 'ทดสอบ')))->text()
        );
    }

    /**
     * Generated from @assert where(array(array(Sql::BETWEEN('id', 0, 1), 'OR', Sql::BETWEEN('id', 0, 1)), array(Sql::BETWEEN('id', 0, 1), 'OR', Sql::BETWEEN('id', 0, 1))), 'OR')->text() [==] " WHERE `id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1".
     *
     * @covers Kotchasan\Database\QueryBuilder::where
     */
    public function testWhere23()
    {

        $this->assertEquals(
          " WHERE `id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1 OR `id` BETWEEN 0 AND 1",
          $this->object->where(array(array(Sql::BETWEEN('id', 0, 1), 'OR', Sql::BETWEEN('id', 0, 1)), array(Sql::BETWEEN('id', 0, 1), 'OR', Sql::BETWEEN('id', 0, 1))), 'OR')->text()
        );
    }
}
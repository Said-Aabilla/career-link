<?php
namespace App\Repository;

class TagRepository extends BaseRepository {


    private static $table = 'tags';

    public function __construct(){
        parent::__construct(self::$table);
    } 



}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{

    public function getCategory(int $id = null): array
   {
       $category = [];
       $quantityCategory = 8;

       if ($id === null) {
           for($i=1; $i <= $quantityCategory; $i++) {
               $category[$i] = [
                   'id' => $i,
                   'title' => \fake()->jobTitle(),
               ];
           }

           return $category;
       }

       return [
           'id' => $id,
           'title' => \fake()->jobTitle(),
       ];
   }


   public function getNews(int $id = null): array
   {
       $news = [];
       $quantityNews = 6;

       if ($id === null) {
           for($i=1; $i <= $quantityNews; $i++) {
               $news[$i] = [
                   'id' => $i,
                   'title' => \fake()->jobTitle(),
                   'description' => \fake()->text(100),
                   'author' => \fake()->userName(),
                   'created_at' => \now()->format('d-m-Y H:i'),
               ];
           }

           return $news;
       }

       return [
           'id' => $id,
           'title' => \fake()->jobTitle(),
           'description' => \fake()->text(100),
           'author' => \fake()->userName(),
           'created_at' => \now()->format('d-m-Y H:i'),
       ];
   }

}
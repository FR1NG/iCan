<?php

namespace App\Console\Commands;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Console\Command;

class Product extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $categories = $categoryRepository->getForConsole();
        $names = [];
        $selectedCategories = [];
        $names[0] = 'Select this when you done choosing categories';
        foreach ($categories as $value) {
            $names[$value->id] = $value->name;
        }
        $name = $this->ask('enter product name: ');
        $price = $this->ask('enter product price: ');
        $description = $this->ask('enter product description: ');
        do {
            $category_name = $this->choice('Choose Category: ', $names);
            $category_id = array_search($category_name, $names);
            if ($category_id != 0 && !in_array($category_id, $selectedCategories)) {
                array_push($selectedCategories, $category_id);
            }
        } while ($category_id);

        $data = ['name' => $name ];
        $data['price'] = $price;
        $data['description'] = $description;
        $data['categories'] = $selectedCategories;
        $data['image'] = 'default.png';
        try {
            $productRepository->create($data);
            $this->info('Product has been created successfully');
        } catch (Exception $e) {
            $this->error("Error: error occured when trying to create product, please verify you inputs and try again");
        }
    }
}

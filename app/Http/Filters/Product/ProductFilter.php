<?php

namespace App\Http\Filters\Product;

use App\Http\Filters\AbstractFilter;

class ProductFilter extends AbstractFilter
{
    public const URL_NAME = 'url_name';
    public const NAME = 'name';
    public const DESCRIPTION = 'description';
    public const GUARANTEE = 'guarantee';
    public const PRICE = 'price';
    public const CATEGORY = 'category';

    protected function getCallbacks(): array{
        return [
            self::NAME => [$this, 'name'],
            self::DESCRIPTION => [$this, 'description'],
            self::GUARANTEE => [$this, 'guarantee'],
            self::PRICE => [$this, 'price'],
            self::CATEGORY => [$this, 'category']
        ];
    }

    public function name($builder, $value){
        $builder->where(self::NAME, 'like', "%{$value}%");
    }

    public function description($builder, $value){
        $builder->where(self::DESCRIPTION, 'like', "%{$value}%");
    }

    public function guarantee($builder, $value){
        $builder->where(self::GUARANTEE, $value);
    }

    public function category($builder, $value){
        $builder->where(self::CATEGORY, $value);
    }

    public function price($builder, $value){
        $builder->where(self::PRICE, $value);
    }
}

<?php

namespace App\Filament\Resources\BookResource\Widgets;

use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BooksAnalytics extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count()),
            Stat::make('Books Last Month', $this->getBooksLastMonth()),
            Stat::make('Books Last Year', $this->getBooksLastYear()),
        ];
    }

    protected function getBooksLastMonth(): int
    {
        return Book::where('created_at', '>=', now()->subMonth())->count();
    }

    protected function getBooksLastYear(): int
    {
        return Book::where('created_at', '>=', now()->subYear())->count();
    }
}

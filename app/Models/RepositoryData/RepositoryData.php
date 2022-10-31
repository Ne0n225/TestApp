<?php

namespace App\Models\RepositoryData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Информация о репозитории
 *
 * @property int $id
 * @property string $subject
 * @property string $data
 */
class RepositoryData extends Model
{
    use HasFactory;

    protected $casts = ['created_at', 'updated_at'];
    protected $guarded = [];

    /**
     * @return RepositoryInfoDto[]
     */
    public function getInfo(): array
    {
        $data = json_decode($this->data, true);
        try {
            $items = $data['items'];
            $dtoList = [];

            foreach ($items as $item) {
                $dtoList[] = new RepositoryInfoDto(
                    $item['name'],
                    $item['owner']['login'],
                    $item['stargazers_count'],
                    $item['watchers_count'],
                    $item['html_url'],
                );
            }

            return $dtoList;
        } catch (\Throwable) {
            throw new \RuntimeException('Не хватает данных.');
        }
    }
}

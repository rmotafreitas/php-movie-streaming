<?php
class media
{

    # PROPS
    public $title;
    public $quality;
    public $year;
    public $cover;
    public $poster;
    public $director;
    public $description;
    public $categories;
    public $type;
    public $duration;
    public $id;
    public $file;

    public function __construct($cfg, $id)
    {
        $qualities = array(
            array(
                'key' => 0,
                'label' => 'SD'
            ),
            array(
                'key' => 1,
                'label' => 'HD',
                'default' => 1
            ),
            array(
                'key' => 2,
                'label' => 'FHD'
            ),
            array(
                'key' => 3,
                'label' => 'UHD'
            ),
        );

        $query = "SELECT * FROM `movies` WHERE `id` = $id";
        $res = my_query($query);
        $res = $res[0];

        # PROPS
        $this->id = $res['id'];
        $this->title = $res['title'];

        $this->quality = [
            'id' => $res['quality'],
            'type' => $qualities[$res['quality']]['label'],
        ];

        $this->year = $res['year'];
        $this->cover = $cfg['urls']['uploads'] . '/covers' . "/{$res['cover']}";
        $this->poster = $cfg['urls']['uploads'] . '/posters' . "/{$res['poster']}";
        $this->director = $res['director'];
        $this->description = $res['description'];
        $this->album = explode(',', $res['album']);

        $this->categories = [
            'arr' => array(),
            'str' => ''
        ];
        $arrCategorias = explode(',', $res['categories']);
        $query = "SELECT * FROM `categories`";
        $arrAllCategorias = my_query($query);
        $arrAllCategorias = indexedArray('id', $arrAllCategorias);
        foreach ($arrCategorias as $value) {
            array_push($this->categories['arr'], $arrAllCategorias[$value]);
            $this->categories['str'] .= $arrAllCategorias[$value]['name'] . ', ';
        }
        $this->categories['str'] = substr_replace($this->categories['str'], "", -2);


        # Only Movie PROPS
        $this->file = $res['file'];

        $strDuration = '';
        $arrDuration = explode(':', $res['duration']);
        $arrTimes = array('Hrs', 'Mins');
        for ($i = 0; $i < 2; $i++) {
            if ($arrDuration[$i] != "00") {
                $strDuration .= "{$arrDuration[$i]} {$arrTimes[$i]} : ";
            }
        }
        $strDuration = substr_replace($strDuration, "", -3);
        $this->duration = [
            'duration' => $res['duration'],
            'str' => $strDuration
        ];
    }
}

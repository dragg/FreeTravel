@extends('layout')

@section('content')

<?php  $option = 0; ?>
<section class="content-wrapper">
    <div class="content __bg-white">
        <div class="search clearfix">
            <div class="search-date">
                
                <form action="<?= action('HabitationController@postSaveHabitation') ?>" method="POST">
                    <input type="text" name="id" value="<?= isset($habitation)? $habitation->id : ''?>" hidden />
                    <div class="search-line">
                        
                        <div class="search-inp-wr">
                            <input value="<?= isset($habitation)? $habitation->title : ''?>" class="input-text" type="text" name="name" placeholder="Название">
                        </div>
                        
                        
                        <div class="search-select-wr">
                            <div class="transform-select-wr">
                                <select name="city" id="" class="transform-select">
                                    
                                    <?php foreach ($cities as $city): ?>
                            
                                    <option value="<?= $city->id?>" 
                                        <?php if(isset($habitation)){
                                            if ($city->id == $habitation->city_id) {
                                                echo 'selected="selected"';
                                            }
                                        } ?>
                                        ><?= $city->name?> 
                                        </option>

                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="search-line">
                        <div class="search-select-wr">
                            <div class="transform-select-wr">
                                <select name="sleeper" id="" class="transform-select">
                                    <?php for($i = 1; $i < 10; $i++) : ?>
                                    <option value="<?= $i ?>"
                                            <?php if(isset($habitation)){
                                                if ($i == $habitation->places) {
                                                    echo 'selected="selected"';
                                                }
                                            } ?>
                                            ><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>

                        <div class="search-inp-wr">
                            <input value="<?= isset($habitation)? $habitation->address : ''?>" class="input-text" type="text" name="address" id="" placeholder="Адрес">
                        </div>
                    </div>
                    
                    <div class="search-check-wr clearfix">
                        <div class="search-check-column">
                            <h6 class="search-check-title">Удобства:</h6>
                            
                            <?php foreach ($amenities as $amenity): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-inet" name="amentities[]" value="<?= $amenity->id?>" type="checkbox" 
                                    <?php if(isset($sAm))
                                     foreach ($sAm as $a) {
                                         if ($a->amenity_id === $amenity->id) {
                                             echo 'checked';
                                             break;
                                         }
                                     }
                                    ?>
                                       >
                                <label for="searchCheck-inet"> <?= $amenity->name;?></label>
                            </div>
                            
                            <?php endforeach; ?>
                           
                        </div>
                        <div class="search-check-column">
                            <h6 class="search-check-title">Ограничения:</h6>
                            
                            <?php foreach ($restrictions as $restriction): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-animal" name="restrictions[]" value="<?= $restriction->id ?>" type="checkbox"
                                    <?php if(isset($sRe))
                                     foreach ($sRe as $r) {
                                         if ($r->restriction_id === $restriction->id) {
                                             echo 'checked';
                                             break;
                                         }
                                     }
                                    ?>
                                       >
                                <label for="searchCheck-animal"><?= $restriction->name?></label>
                            </div>
                            
                            <?php endforeach; ?>
                            
                        </div>
                    </div>

                    <div class="search-textarea">
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Описание"><?= isset($habitation)? $habitation->description : ''?></textarea>
                    </div>

                    <div class="popup-btns-bar">
                        {{ Form::submit('Сохранить', ['class' => "btn--popup-2btn __btn-green"]); }}
                        <a href="#" class="btn--popup-2btn __btn-red">Отмена</a>
                    </div>
                    
                </form>
            </div>
            
            <div class="search-load-photo">
                <div class="search-load-img">
                    <img src="<?= file_exists('public/habitationsPic/' . $habitation->id . '.jpg') ? '/habitationsPic/' . $habitation->id . '.jpg' : '/habitationsPic/none.jpg' ?>" id="avatar">
                    <div class="search-load-controls-wr" hidden>
                        <a href="#" class="page-conrol __close" ></a>
                    </div>
                    <div class="search-load-controls-wr" style="display: <?= file_exists('public/habitationsPic/' . $habitation->id . '.jpg') ? 'block' : 'none' ?>">
                        <a id="deleteAvatar" href="#" class="page-conrol __close"></a>
                    </div>
                </div>
               <div class="input-filesuctom" style="display: block;">
                    <form id="uploadHabPic" action="{{action('UploadController@postUploadHabitationPic')}}" method="post" enctype="multipart/form-data">
                        <input type="file" size="60" name="HabitationPic" id="fileupload">
                        {{ Form::hidden('id', isset($habitation) ? $habitation->id : '') }}
                        <a id="uploadButtonHabPic" class="btn--profile-load __btn-green">Загрузить</a>
                    </form>


                </div>
<!--                <section>
                    <div class="content" style="width: 400px">
                        <div id="progress">
                               <div id="percent" style="display: none">0%</div>
                        </div>
                    </div>
                </section>-->
            </div>
            
<!--            <div class="search-load-photo">
                <div class="search-load-img">
                    <div class="search-load-img-empty">нет фото</div>
                     <img src="i/photo-search.jpg" alt="">
                    <div class="search-load-controls-wr">
                        <a href="#" class="page-conrol __close"></a>
                    </div> 
                </div>
               <div class="input-filesuctom" style="display:none;">
                  <a class="btn--search-load __btn-green">Загрузить</a>
                  <input type="file" id="fileupload" name="f_File" multiple="">
                </div>
            </div>-->
        </div>
    </div>
</section>

@stop
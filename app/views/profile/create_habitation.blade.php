@extends('layout')

@section('content')

<?php $option = 0; ?>
<section class="content-wrapper">
    <div class="content __bg-white">
        <div class="search clearfix">
            <div class="search-date">
                
                <form action="<?php echo action('HabitationController@postSaveHabitation') ?>" method="POST">
                    <div class="search-line">
                        
                        <div class="search-inp-wr">
                            <input class="input-text" type="text" name="name" placeholder="Название">
                        </div>
                        
                        
                        <div class="search-select-wr">
                            <div class="transform-select-wr">
                                <select name="city" id="" class="transform-select">
                                    
                                    <?php foreach ($cities as $city): ?>
                            
                                    <option value="<?= $city->id?>"><?= $city->name?></option>

                                    <?php endforeach; ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="search-line">
                        <div class="search-select-wr">
                            <div class="transform-select-wr">
                                <select name="sleeper" id="" class="transform-select">
                                    <option value="">Спальных мест</option>
                                    <option value="">Спальных мест</option>
                                </select>
                            </div>
                        </div>

                        <div class="search-inp-wr">
                            <input class="input-text" type="text" name="address" id="" placeholder="Адрес">
                        </div>
                    </div>
                    
                    <div class="search-check-wr clearfix">
                        <div class="search-check-column">
                            <h6 class="search-check-title">Удобства:</h6>
                            
                            <?php foreach ($amenities as $amenity): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-inet" name="amentities[]" value="<?= $amenity->id?>" type="checkbox">
                                <label for="searchCheck-inet"> <?= $amenity->name;?></label>
                            </div>
                            
                            <?php endforeach; ?>
                           
                        </div>
                        <div class="search-check-column">
                            <h6 class="search-check-title">Ограничения:</h6>
                            
                            <?php foreach ($restrictions as $restriction): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-animal" name="restriction[]" value="<?= $restriction->id ?>" type="checkbox">
                                <label for="searchCheck-animal"><?= $restriction->name?></label>
                            </div>
                            
                            <?php endforeach; ?>
                            
                        </div>
                    </div>

                    <div class="search-textarea">
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Описание"></textarea>
                    </div>

                    <div class="popup-btns-bar">
                        <a id="saveHabitation" href="#" class="btn--popup-2btn __btn-green">Сохранить</a>
                        <a href="#" class="btn--popup-2btn __btn-red">Отмена</a>
                    </div>
                    
                </form>
            </div>
            <div class="search-load-photo">
                <div class="search-load-img">
                    <div class="search-load-img-empty">нет фото</div>
                    <!-- <img src="i/photo-search.jpg" alt="">
                    <div class="search-load-controls-wr">
                        <a href="#" class="page-conrol __close"></a>
                    </div> -->
                </div>
               <div class="input-filesuctom" style="display:none;">
                  <a class="btn--search-load __btn-green">Загрузить</a>
                  <input type="file" id="fileupload" name="f_File" multiple="">
                </div>
            </div>
        </div>
    </div>
</section>

@stop
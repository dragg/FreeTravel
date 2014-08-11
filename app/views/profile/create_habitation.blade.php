@extends('layout')

@section('content')


<section class="content-wrapper">
    <div class="content __bg-white">
        <div class="search clearfix">
            <div class="search-date">
                <form action="">
                    <div class="search-line">
                        <div class="search-inp-wr">
                            <input class="input-text" type="text" id="" placeholder="Название">
                        </div>
                        <div class="search-select-wr">
                            <div class="transform-select-wr">
                                <select name="" id="" class="transform-select">
                                    
                                    <?php for ($i = 0; $i < count($cities); $i++): ?>
                            
                                    <option value="<?= $cities[$i]->id?>"><?= $cities[$i]->name?></option>

                                    <?php endfor; ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="search-line">
                        <div class="search-select-wr">
                            <div class="transform-select-wr">
                                <select name="" id="" class="transform-select">
                                    <option value="">Спальных мест</option>
                                    <option value="">Спальных мест</option>
                                </select>
                            </div>
                        </div>

                        <div class="search-inp-wr">
                            <input class="input-text" type="text" id="" placeholder="Адрес">
                        </div>
                    </div>
                    <div class="search-check-wr clearfix">
                        <div class="search-check-column">
                            <h6 class="search-check-title">Удобства:</h6>
                            <?php for ($i = 0; $i < count($amenities); $i++): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-inet" type="checkbox">
                                <label for="searchCheck-inet"><?= $amenities[$i]->name?></label>
                            </div>
                            
                            <?php endfor; ?>
                            
                            <!--
                            <?php //foreach ($amenity as $amenities): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-inet" type="checkbox">
                                <label for="searchCheck-inet">
                            <?php //echo $amenity->name;?>
                            </label>
                            </div>
                            
                            <?php //endforeach; ?>
                            -->
                        </div>
                        <div class="search-check-column">
                            <h6 class="search-check-title">Ограничения:</h6>
                            
                            <?php for ($i = 0; $i < count($restrictions); $i++): ?>
                            
                            <div class="search-checkbox-wr">
                                <input id="searchCheck-animal" type="checkbox">
                                <label for="searchCheck-animal"><?= $restrictions[$i]->name?></label>
                            </div>
                            
                            <?php endfor; ?>
                            
                        </div>
                    </div>

                    <div class="search-textarea">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Описание"></textarea>
                    </div>

                    <div class="popup-btns-bar">
                        <a href="#" class="btn--popup-2btn __btn-green">Сохранить</a>
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
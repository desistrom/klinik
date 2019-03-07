                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <small>Tambah Promo</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('promo/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record['promo_id']?>">
                                <div class="form-group">
                                    <label>Nama Promo</label>
                                    <input class="form-control" name="nama_promo" value="<?php echo $record['nama_promo']?>">
                                </div>
                                <div class="form-group">
                                    <label>Berlaku sampai</label>
                                    <input type=date class="form-control" name="date_promo" value="<?php echo $record['date_promo']?>">
                                </div>
                                <div class="form-group">
                                    <label>Besar Diskon</label>
                                    <input style="width: 50px"class="form-control" name="besar_diskon" value="<?php echo $record['besar_diskon']*100?>" >%
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('promo','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
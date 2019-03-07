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
                                <?php echo form_open('promo/inputPromo'); ?>
                                <div class="form-group">
                                    <label>Nama Promo</label>
                                    <input class="form-control" name="nama_promo" placeholder="nama promo">
                                </div>
                                <div class="form-group">
                                    <label>Berlaku sampai</label>
                                    <input type=date class="form-control" name="date_promo" placeholder="sampai tanggal">
                                </div>
                                <div class="form-group">
                                    <label>Besar Diskon</label>
                                    <input class="form-control" name="diskon_promo" placeholder="besar diskon">%
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
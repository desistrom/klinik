                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Kasir Online <small>Data Promo</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('promo/inputPromo','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama diskon</th>
                                                <th>Tanggal</th>
                                                <th>Besar Diskon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_promo ?></td>
                                                <td><?php echo $r->date_promo ?></td>
                                                <td><?php echo $r->besar_diskon*100 ?> %</td>
                                                <td class="center">
                                                    <?php echo anchor('promo/edit/'.$r->promo_id,'Edit'); ?> | 
                                                    <?php echo anchor('promo/delete/'.$r->promo_id,'Delete'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->



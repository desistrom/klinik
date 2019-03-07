<!--
<div class="row">
            <div class="col-md-12">
                <h2 class="page-header">
                    POS (Point of Sale) <small>Transaksi</small>
                </h2>
            </div>
        </div> 
         /. ROW  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Harga Setelah Diskon</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; $total=0; 
                                    foreach ($detail as $r){ ?>
                                    <tr class="gradeU">
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $r->nama_barang ?></td>
                                        <td><?php echo $r->qty ?></td>
                                        <td>Rp. <?php echo number_format($r->harga-$r->besar_diskon*$r->harga) ?></td>
                                        <td>Rp. <?php echo number_format($r->harga) ?></td>
                                        <td>Rp. <?php echo number_format($r->harga*$r->qty-$r->qty*$r->besar_diskon*$r->harga) ?></td>
                                    </tr>
                                <?php $total=$total+($r->harga*$r->qty-$r->qty*$r->besar_diskon*$r->harga);
                                $no++; } ?>
                                    <tr class="gradeA">
                                        <td colspan="4">T O T A L</td>
                                        <td>Rp. <?php echo number_format($total,2);?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         /. TABLE  
                    </div>
                </div>
            </div>
        </div>
-->

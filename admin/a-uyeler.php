<?php include 'admin-header.php'; if($kbilgi["yetki"] == 2){ ?>
<?php include 'admin-menu.php';?>			



            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Kullanıcılar</h4>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->





				
<?php

	  

      if ($_GET["uyesil"]=="ok") {
        $id=$_GET["id"];
          $uyesil=$vt->prepare("delete from uyeler where id=?");
          $uyesil->execute(array($id));
          if ($uyesil) {
             echo '
			  <div class="card-body">
                                        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                            <i class="fa fa-check label-icon"></i><strong>Başarılı</strong> - Kullanıcının kayıdı silinmiştir
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
										';
          }else{
            header("Location:no");
          }
      }
	  
	  ?>
	  

	  
						
						
		  <div class="row">
		  
		  
		  
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kayıtlı Kullanıcılar</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">

                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Adı Soyadı</th>
                                                    <th>E-Mail Adresi</th>
                                                    <th>Kredisi</th>
												   <th>Düzenle</th>
                                                </tr>
                                            </thead>
											
											
                                            <tbody>
											
<?php $uye  = $vt->query("select * from uyeler ORDER by id")->fetchAll(PDO::FETCH_ASSOC); foreach ($uye as $uye) {  ?>
	
                                                <tr>
                                                    <th scope="row"><?php echo $uye["id"] ?></th>
                                                    <td><?php echo $uye["username"] ?></td>
                                                    <td><?php echo $uye["email"] ?></td>
                                                    <td><?php echo $uye["bakiye"] ?> TL</td>
													<td>
						<a href="kullanici-duzenle.php?id=<?php echo $uye["id"] ?>" style="border-radius:6px;  font-size:10px;" class="btn btn-info">Düzenle</a>
						<a href="?id=<?php echo $uye["id"] ?>&uyesil=ok" style="border-radius:6px;  font-size:10px;" class="btn btn-danger">Sil</a>
						
						</td>
                                                </tr>
<?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




				      </div>
		
						
						
						
						
						
						
                    </div>
                </div>









<?php include 'admin-footer.php'; } ?>
				


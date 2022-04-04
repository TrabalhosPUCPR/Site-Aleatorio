					<?php
						require_once 'includes/db-inc.php';
						$id = $_SESSION['usersId'];
						$sql = "SELECT * FROM users WHERE usersId='$id'";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0){
								while($col = mysqli_fetch_assoc($result)){
									$id = $col['usersId'];
									$sqlimg = "SELECT * FROM fotoperfil WHERE userid='$id'";
									$resultimg = mysqli_query($conn, $sqlimg);
									while ($colimg = mysqli_fetch_assoc($resultimg)){
										if ($colimg['status'] == 0){
											echo "<img src='image/upload/perfil".$id.".jpg'>";
										}else{
											echo "<img src='image/upload/padrao.jpg'>";
										}
									}
								}
							} 
					?>
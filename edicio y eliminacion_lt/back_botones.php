//botones de eliminacion y edicion de usuarios
<td>
<a href='ediciondeusuario.php?id=<?php echo $row['id']; ?>' class="btn btn-primary btn-sm">Editar usuario</a>
<a href="back_eliminarusuario.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar usuario</a>
 </td>
 //botones de eliminacion y edicion de alumnos
 <td>
<a href='ediciondealumno.php?id=<?php echo $row['id']; ?>' class="btn btn-primary btn-sm">Editar usuario</a>
<a href="back_eliminaralumno.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar usuario</a>
 </td>
 //botones de eliminacion y edicion de anexos
 <td>
<a href='ediciondeanexos.php?id=<?php echo $row['id']; ?>' class="btn btn-primary btn-sm">Editar usuario</a>
<a href="back_eliminaranexos.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar usuario</a>
 </td>
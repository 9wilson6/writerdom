
                        <?php 
                        require_once("../dbconfig/dbconnect.php");
                        $query="SELECT project_id FROM projects LEFT JOIN closed ON projects.project_id=closed.project_id LEFT JOIN users ON closed.tutor_id=users.user_id WHERE projects.status=4";
                        $results=$db->get_results($query);
                       
                        die();

                            $output=' <table>
                                    
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Student Id</th>
                                    <th>Amount Due</th>
                                
                                </tr>
                            </thead>
                            
                            <tr>
                                 <td>wilson</td>
                                <td>50</td> </tr>
                                 </table>';
                            header("Content-Disposition: attachment; filename=wilson.xls");
                            header("Content-Type: application/vnd.ms-excel");

                            
                            echo $output;
                           
                         ?>
                 
                            
                                
                            

                        
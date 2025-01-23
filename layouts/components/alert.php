<?php
                            if (isset($message)) {
                                if ($result != 0) {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo '<i class="fa-sharp fa-solid fa-circle-check"></i>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo '<i class="fa-regular fa-circle-xmark"></i>';
                                }

                                echo $message;
                                echo '</div>';
                            }
                            ?>
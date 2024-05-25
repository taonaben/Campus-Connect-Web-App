<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();

echo "<script>
                    alert('Registration successful!');
                  </script>";

header('location:index.php');

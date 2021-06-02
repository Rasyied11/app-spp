<?php

session_start(); // Start session nya
session_destroy(); // Hapus semua session
echo ("<script type='text/javascript'>window.location = '../';</script>");

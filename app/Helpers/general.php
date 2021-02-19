<?php

function getFolderLang(){
    if (app()->getLocale() === 'ar'){
        return 'css-rtl';
    }else{
        return 'css';
    }
}

function getStyleFolderLang(){
    if (app()->getLocale() === 'ar'){
        return 'style-rtl.css';
    }else{
        return 'style.css';
    }
}

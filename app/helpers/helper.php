<?php

if (!function_exists('getSourceFilePath')) {
    function getSourceFilePath($nameSpace, $name): string
    {
        return realpath('') . $nameSpace . '/' . $name . '.php';
    }
}

if (!function_exists('makeDirectory')) {
    /**
     * @param $path
     * @return void
     */
    function makeDirectory($path): void
    {
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }
}

if (!function_exists('generateStubContents')) {
    /**
     * @param $stub
     * @param array $stubVariables
     * @param string $separator
     * @return array|bool|string
     */
    function generateStubContents($stub, array $stubVariables = [], string $separator = '$'): array|bool|string
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace($separator . $search . $separator, $replace, $contents);
        }

        return $contents;
    }
}

if (!function_exists('createFile')) {
    /**
     * @param $path
     * @param $contents
     * @return bool
     */
    function createFile($path, $contents): bool
    {
        if (!file_exists($path)) {
            file_put_contents($path, $contents, 0);
            return true;
        }
        return false;
    }
}

if (!function_exists('view')) {
    function view($path, $args = [])
    {
        $session = $_SESSION;
        $get = $_GET;
        $server = $_SERVER;
        $request = $_REQUEST;
        extract($args);
        return require realpath('src/views/' . $path . '.php');
    }
}


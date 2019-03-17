<?php

/* base.html.twig */
class __TwigTemplate_88ec8d68e634f8e29b8329066289392e45c9093e22ffe491d9b6fcc10b8c43eb extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'header' => [$this, 'block_header'],
            'header_navigation_links' => [$this, 'block_header_navigation_links'],
            'aside' => [$this, 'block_aside'],
            'fos_user_content' => [$this, 'block_fos_user_content'],
            'footer' => [$this, 'block_footer'],
            'controlSidebar' => [$this, 'block_controlSidebar'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
    ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "</head>

    <body class=\"hold-transition skin-blue sidebar-mini\">

        <div class=\"wrapper\">

            <header class=\"main-header\">

                ";
        // line 18
        $this->displayBlock('header', $context, $blocks);
        // line 23
        echo "
            </header>

            <aside class=\"main-sidebar\">

                ";
        // line 28
        $this->displayBlock('aside', $context, $blocks);
        // line 29
        echo "
            </aside>

            <div class=\"content-wrapper\">

                ";
        // line 34
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 35
        echo "
            </div>

            <footer class=\"main-footer\">

                ";
        // line 40
        $this->displayBlock('footer', $context, $blocks);
        // line 41
        echo "
            </footer>

            <aside class=\"control-sidebar control-sidebar-dark\">

                ";
        // line 46
        $this->displayBlock('controlSidebar', $context, $blocks);
        // line 47
        echo "
            </aside>


    ";
        // line 51
        $this->displayBlock('javascripts', $context, $blocks);
        // line 52
        echo "
        </div>
    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        echo "Publish";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    // line 18
    public function block_header($context, array $blocks = [])
    {
        // line 19
        echo "
                    ";
        // line 20
        $this->displayBlock('header_navigation_links', $context, $blocks);
        // line 21
        echo "
                 ";
    }

    // line 20
    public function block_header_navigation_links($context, array $blocks = [])
    {
    }

    // line 28
    public function block_aside($context, array $blocks = [])
    {
        echo " ";
    }

    // line 34
    public function block_fos_user_content($context, array $blocks = [])
    {
    }

    // line 40
    public function block_footer($context, array $blocks = [])
    {
        echo " ";
    }

    // line 46
    public function block_controlSidebar($context, array $blocks = [])
    {
        echo " ";
    }

    // line 51
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  162 => 51,  156 => 46,  150 => 40,  145 => 34,  139 => 28,  134 => 20,  129 => 21,  127 => 20,  124 => 19,  121 => 18,  116 => 9,  110 => 6,  103 => 52,  101 => 51,  95 => 47,  93 => 46,  86 => 41,  84 => 40,  77 => 35,  75 => 34,  68 => 29,  66 => 28,  59 => 23,  57 => 18,  47 => 10,  45 => 9,  39 => 6,  32 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/views/base.html.twig");
    }
}

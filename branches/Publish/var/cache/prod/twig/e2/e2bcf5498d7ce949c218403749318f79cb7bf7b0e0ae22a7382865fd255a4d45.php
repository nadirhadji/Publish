<?php

/* @FOSUser/Registration/register_content.html.twig */
class __TwigTemplate_bd44e0d8277c0729c2636c46f35a3bd864dd776bd258dca64fe7500e230ba0de extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 3
        $this->parent = $this->loadTemplate("layout.html.twig", "@FOSUser/Registration/register_content.html.twig", 3);
        $this->blocks = [
            'fos_user_content' => [$this, 'block_fos_user_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "themes/app_theme.html.twig"], true);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_fos_user_content($context, array $blocks = [])
    {
        // line 6
        echo "
     <body class=\"hold-transition register-page\">
     <div class=\"register-box\">
         <div class=\"register-logo\">
             <a href=\"\"><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("templates/dist/img/logo.png"), "html", null, true);
        echo "\" alt=\"logo\" /></a>
         </div>

         <div class=\"register-box-body\">

             <p class=\"login-box-msg\">Register a new membership</p>

             ";
        // line 17
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', ["method" => "post", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_registration_register"), "attr" => ["class" => "fos_user_registration_register"]]);
        echo "

             <div class=\"form-group has-feedback\">
                ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
               ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "username", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                ";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstName", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastName", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "country", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>


             <div>
                 <input class=\"btn btn-primary\" type=\"submit\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("registration.submit"), "html", null, true);
        echo "\" />
             </div>
             ";
        // line 51
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

             <div class=\"social-auth-links text-center\">
                 <p>- OR -</p>
                 <a href=\"#\" class=\"btn btn-block btn-social btn-facebook btn-flat\"><i class=\"fa fa-facebook\"></i> Sign up using
                     Facebook</a>
                 <a href=\"#\" class=\"btn btn-block btn-social btn-google btn-flat\"><i class=\"fa fa-google-plus\"></i> Sign up using
                     Google+</a>
             </div>

             <a href=\"";
        // line 61
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_security_login");
        echo "\" class=\"text-center\">I already have a membership</a>
         </div>
         <!-- /.form-box -->
     </div>
     <!-- /.register-box -->

 ";
    }

    public function getTemplateName()
    {
        return "@FOSUser/Registration/register_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 61,  115 => 51,  110 => 49,  102 => 44,  95 => 40,  88 => 36,  81 => 32,  74 => 28,  67 => 24,  60 => 20,  54 => 17,  44 => 10,  38 => 6,  35 => 5,  31 => 3,  29 => 1,  15 => 3,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@FOSUser/Registration/register_content.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/FOSUserBundle/views/Registration/register_content.html.twig");
    }
}

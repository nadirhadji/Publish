<?php

/* @FOSUser/Registration/register_content.html.twig */
class __TwigTemplate_f3aac7fb2ed5f24fd931790bc96430a85c9c471a6528490dc1d8efb5c4ed46cb extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Registration/register_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@FOSUser/Registration/register_content.html.twig"));

        // line 1
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 1, $this->source); })()), [0 => "themes/app_theme.html.twig"], true);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_fos_user_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

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
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 17, $this->source); })()), 'form_start', ["method" => "post", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_registration_register"), "attr" => ["class" => "fos_user_registration_register"]]);
        echo "

             <div class=\"form-group has-feedback\">
                ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 20, $this->source); })()), "email", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
               ";
        // line 24
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 24, $this->source); })()), "username", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                ";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 28, $this->source); })()), "firstName", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 32, $this->source); })()), "lastName", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 36, $this->source); })()), "city", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 40, $this->source); })()), "country", []), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 44, $this->source); })()), "plainPassword", []), 'row', ["attr" => ["class" => "form-control"]]);
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
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 51, $this->source); })()), 'form_end');
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

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
        return array (  146 => 61,  133 => 51,  128 => 49,  120 => 44,  113 => 40,  106 => 36,  99 => 32,  92 => 28,  85 => 24,  78 => 20,  72 => 17,  62 => 10,  56 => 6,  47 => 5,  37 => 3,  35 => 1,  15 => 3,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% form_theme form 'themes/app_theme.html.twig' %}

{% extends \"layout.html.twig\" %}

 {% block fos_user_content %}

     <body class=\"hold-transition register-page\">
     <div class=\"register-box\">
         <div class=\"register-logo\">
             <a href=\"\"><img src=\"{{ asset('templates/dist/img/logo.png') }}\" alt=\"logo\" /></a>
         </div>

         <div class=\"register-box-body\">

             <p class=\"login-box-msg\">Register a new membership</p>

             {{ form_start(form, {'method': 'post', 'action': path('fos_user_registration_register'), 'attr': {'class': 'fos_user_registration_register'}}) }}

             <div class=\"form-group has-feedback\">
                {{ form_row(form.email, {'attr' : {'class' : 'form-control'}}) }}
             </div>

             <div class=\"form-group has-feedback\">
               {{ form_row(form.username, {'attr' : {'class' : 'form-control'}}) }}
             </div>

             <div class=\"form-group has-feedback\">
                {{ form_row(form.firstName, {'attr' : {'class' : 'form-control'}}) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.lastName, {'attr' : {'class' : 'form-control'}}) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.city, {'attr' : {'class' : 'form-control'}}) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.country, {'attr' : {'class' : 'form-control'}}) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.plainPassword, {'attr' : {'class' : 'form-control'}}) }}
             </div>


             <div>
                 <input class=\"btn btn-primary\" type=\"submit\" value=\"{{ 'registration.submit'|trans }}\" />
             </div>
             {{ form_end(form) }}

             <div class=\"social-auth-links text-center\">
                 <p>- OR -</p>
                 <a href=\"#\" class=\"btn btn-block btn-social btn-facebook btn-flat\"><i class=\"fa fa-facebook\"></i> Sign up using
                     Facebook</a>
                 <a href=\"#\" class=\"btn btn-block btn-social btn-google btn-flat\"><i class=\"fa fa-google-plus\"></i> Sign up using
                     Google+</a>
             </div>

             <a href=\"{{ path('fos_user_security_login') }}\" class=\"text-center\">I already have a membership</a>
         </div>
         <!-- /.form-box -->
     </div>
     <!-- /.register-box -->

 {% endblock fos_user_content %}", "@FOSUser/Registration/register_content.html.twig", "/Applications/MAMP/htdocs/Publish/app/Resources/FOSUserBundle/views/Registration/register_content.html.twig");
    }
}

<?php

/* @FOSUser/Registration/register_content.html.twig */
class __TwigTemplate_f3aac7fb2ed5f24fd931790bc96430a85c9c471a6528490dc1d8efb5c4ed46cb extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "@FOSUser/Registration/register_content.html.twig", 1);
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

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        echo "
     <body class=\"hold-transition register-page\">
     <div class=\"register-box\">
         <div class=\"register-logo\">
             <a href=\"../../index2.html\"><b>Admin</b>LTE</a>
         </div>

         <div class=\"register-box-body\">

             <p class=\"login-box-msg\">Register a new membership</p>

             ";
        // line 15
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 15, $this->source); })()), 'form_start', ["method" => "post", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fos_user_registration_register"), "attr" => ["class" => "fos_user_registration_register"]]);
        echo "

             <div class=\"form-group has-feedback\">
             ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 18, $this->source); })()), "email", []), 'row');
        echo "
             </div>

             <div class=\"form-group has-feedback\">
             ";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 22, $this->source); })()), "username", []), 'row');
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 26
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 26, $this->source); })()), "firstName", []), 'row');
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 30, $this->source); })()), "lastName", []), 'row');
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 34
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 34, $this->source); })()), "city", []), 'row');
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 38, $this->source); })()), "country", []), 'row');
        echo "
             </div>

             <div class=\"form-group has-feedback\">
                 ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 42, $this->source); })()), "plainPassword", []), 'row');
        echo "
             </div>


             <div>
                 <input class=\"btn btn-primary\" type=\"submit\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("registration.submit"), "html", null, true);
        echo "\" />
             </div>
             ";
        // line 49
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 49, $this->source); })()), 'form_end');
        echo "

             <div class=\"social-auth-links text-center\">
                 <p>- OR -</p>
                 <a href=\"#\" class=\"btn btn-block btn-social btn-facebook btn-flat\"><i class=\"fa fa-facebook\"></i> Sign up using
                     Facebook</a>
                 <a href=\"#\" class=\"btn btn-block btn-social btn-google btn-flat\"><i class=\"fa fa-google-plus\"></i> Sign up using
                     Google+</a>
             </div>

             <a href=\"login.html\" class=\"text-center\">I already have a membership</a>
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
        return array (  127 => 49,  122 => 47,  114 => 42,  107 => 38,  100 => 34,  93 => 30,  86 => 26,  79 => 22,  72 => 18,  66 => 15,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

 {% block fos_user_content %}

     <body class=\"hold-transition register-page\">
     <div class=\"register-box\">
         <div class=\"register-logo\">
             <a href=\"../../index2.html\"><b>Admin</b>LTE</a>
         </div>

         <div class=\"register-box-body\">

             <p class=\"login-box-msg\">Register a new membership</p>

             {{ form_start(form, {'method': 'post', 'action': path('fos_user_registration_register'), 'attr': {'class': 'fos_user_registration_register'}}) }}

             <div class=\"form-group has-feedback\">
             {{ form_row(form.email) }}
             </div>

             <div class=\"form-group has-feedback\">
             {{ form_row(form.username) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.firstName) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.lastName) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.city) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.country) }}
             </div>

             <div class=\"form-group has-feedback\">
                 {{ form_row(form.plainPassword) }}
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

             <a href=\"login.html\" class=\"text-center\">I already have a membership</a>
         </div>
         <!-- /.form-box -->
     </div>
     <!-- /.register-box -->

 {% endblock fos_user_content %}", "@FOSUser/Registration/register_content.html.twig", "/Applications/MAMP/htdocs/2018-l3ac1/branches/Publish/app/Resources/FOSUserBundle/views/Registration/register_content.html.twig");
    }
}

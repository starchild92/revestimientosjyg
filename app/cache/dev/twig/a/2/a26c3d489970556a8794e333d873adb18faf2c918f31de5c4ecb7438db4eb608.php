<?php

/* JYGRevestimientosBundle:Page:ayuda.html.twig */
class __TwigTemplate_a26c3d489970556a8794e333d873adb18faf2c918f31de5c4ecb7438db4eb608 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:ayuda.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f0b656cbd238f942cd6ddff13ebf7ef3801a2530c01a651728dc0f3b444250ea = $this->env->getExtension("native_profiler");
        $__internal_f0b656cbd238f942cd6ddff13ebf7ef3801a2530c01a651728dc0f3b444250ea->enter($__internal_f0b656cbd238f942cd6ddff13ebf7ef3801a2530c01a651728dc0f3b444250ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:ayuda.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f0b656cbd238f942cd6ddff13ebf7ef3801a2530c01a651728dc0f3b444250ea->leave($__internal_f0b656cbd238f942cd6ddff13ebf7ef3801a2530c01a651728dc0f3b444250ea_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_d1da1db683d056754bd36f32c979bcca7ab689910ac82be8f0cbdfff74907c63 = $this->env->getExtension("native_profiler");
        $__internal_d1da1db683d056754bd36f32c979bcca7ab689910ac82be8f0cbdfff74907c63->enter($__internal_d1da1db683d056754bd36f32c979bcca7ab689910ac82be8f0cbdfff74907c63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Ayuda";
        
        $__internal_d1da1db683d056754bd36f32c979bcca7ab689910ac82be8f0cbdfff74907c63->leave($__internal_d1da1db683d056754bd36f32c979bcca7ab689910ac82be8f0cbdfff74907c63_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_acd13e3aa3b3cda70fd321906a50b5206c70586526abb119f90709ae9ec90c65 = $this->env->getExtension("native_profiler");
        $__internal_acd13e3aa3b3cda70fd321906a50b5206c70586526abb119f90709ae9ec90c65->enter($__internal_acd13e3aa3b3cda70fd321906a50b5206c70586526abb119f90709ae9ec90c65_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_acd13e3aa3b3cda70fd321906a50b5206c70586526abb119f90709ae9ec90c65->leave($__internal_acd13e3aa3b3cda70fd321906a50b5206c70586526abb119f90709ae9ec90c65_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:ayuda.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}

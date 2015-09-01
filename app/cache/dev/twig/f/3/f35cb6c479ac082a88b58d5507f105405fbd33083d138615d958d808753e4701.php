<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_f35cb6c479ac082a88b58d5507f105405fbd33083d138615d958d808753e4701 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_df0c06f962d202d8ebbcb6dfc2aac6feceda79b0389453f7de1e66d8b2b7ef16 = $this->env->getExtension("native_profiler");
        $__internal_df0c06f962d202d8ebbcb6dfc2aac6feceda79b0389453f7de1e66d8b2b7ef16->enter($__internal_df0c06f962d202d8ebbcb6dfc2aac6feceda79b0389453f7de1e66d8b2b7ef16_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_df0c06f962d202d8ebbcb6dfc2aac6feceda79b0389453f7de1e66d8b2b7ef16->leave($__internal_df0c06f962d202d8ebbcb6dfc2aac6feceda79b0389453f7de1e66d8b2b7ef16_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_58c248e0eb882c005a48928c39444408d73f3d808e04697015a77e840298b8c0 = $this->env->getExtension("native_profiler");
        $__internal_58c248e0eb882c005a48928c39444408d73f3d808e04697015a77e840298b8c0->enter($__internal_58c248e0eb882c005a48928c39444408d73f3d808e04697015a77e840298b8c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_58c248e0eb882c005a48928c39444408d73f3d808e04697015a77e840298b8c0->leave($__internal_58c248e0eb882c005a48928c39444408d73f3d808e04697015a77e840298b8c0_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_80f92124681c82333dd231eaab68d1d3c25bf53f8100da92dc1ddebb0c087625 = $this->env->getExtension("native_profiler");
        $__internal_80f92124681c82333dd231eaab68d1d3c25bf53f8100da92dc1ddebb0c087625->enter($__internal_80f92124681c82333dd231eaab68d1d3c25bf53f8100da92dc1ddebb0c087625_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_80f92124681c82333dd231eaab68d1d3c25bf53f8100da92dc1ddebb0c087625->leave($__internal_80f92124681c82333dd231eaab68d1d3c25bf53f8100da92dc1ddebb0c087625_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_3794f5bca29cb11ad6463a63fa9c99edce4bfcd0096d93fe91d2f26f43afc073 = $this->env->getExtension("native_profiler");
        $__internal_3794f5bca29cb11ad6463a63fa9c99edce4bfcd0096d93fe91d2f26f43afc073->enter($__internal_3794f5bca29cb11ad6463a63fa9c99edce4bfcd0096d93fe91d2f26f43afc073_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_3794f5bca29cb11ad6463a63fa9c99edce4bfcd0096d93fe91d2f26f43afc073->leave($__internal_3794f5bca29cb11ad6463a63fa9c99edce4bfcd0096d93fe91d2f26f43afc073_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Blogs;
use App\Models\Contacts;
use App\Models\Footers;
use App\Models\Productcategories;
use App\Models\Productsoptions;
use Closure;
use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Facades\View;
use App\Models\Settings;
use App\Models\Blogoptions;
use App\Models\Newsoptions;
use App\Models\News;

class Share
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data['settings'] = Settings::all();
        foreach ($data['settings'] as $key){
            $settings[$key->settings_key] = $key->settings_value;
        }

        //pages değerleri
        $page = Pages::all()->sortBy('must')->where('status',1)->where('header',1);
        $settings['pages'] = $page;

        //contact
        $contactData = Contacts::all()->where('status',1);
        foreach ($contactData as $cntDt){
            $settings[$cntDt->key] = $cntDt->value;
        }

        //blog
        $blogData = Blogoptions::all()->where('status',1);
        foreach ($blogData as $blgDt){
            $settings[$blgDt->key] = $blgDt->value;
        }

        //product
        $proData = Productsoptions::all()->where('status',1);
        foreach ($proData as $prDt){
            $settings[$prDt->key] = $prDt->value;
        }

        //news
        $newsData = Newsoptions::all()->where('status',1);
        foreach ($newsData as $nsDt){
            $settings[$nsDt->key] = $nsDt->value;
        }

        //social
        $socialIconsHtml = '';
        if(isset($settings['contact_facebook'])){$socialIconsHtml .= '<li class="facebook"><a href="'.$settings['contact_facebook'].'" target="_blank" title="Facebook"></a></li>';}
        if(isset($settings['contact_instagram'])){$socialIconsHtml .= '<li class="instagram"><a href="'.$settings['contact_instagram'].'" target="_blank" title="Instagram"></a></li>';}
        if(isset($settings['contact_twitter'])){$socialIconsHtml .= '<li class="twitter"><a href="'.$settings['contact_twitter'].'" target="_blank" title="Twitter"></a></li>';}
        if(isset($settings['contact_youtube'])){$socialIconsHtml .= '<li class="youtube"><a href="'.$settings['contact_youtube'].'" target="_blank" title="Youtube"></a></li>';}
        $settings['socialHtml'] = $socialIconsHtml;

        //footer
        $kolonsayisi    = $settings['footer_kolon_sayisi'];
        if($kolonsayisi == 4){$tk=4;$coln=3;}elseif($kolonsayisi == 3){$tk=3;$coln=4;} elseif($kolonsayisi == 2){$tk=2;$coln=6;} elseif($kolonsayisi == 1){$tk=1;$coln=12;} else{$tk=4;$coln=3;}
        $footer         = Footers::all()->sortBy('must')->where('status',1)->take($tk);
        $footerHtml = '';
        foreach ($footer as $fk){
            if($fk->type == "blok"){
                if($fk->value == "iletisim"){
                    $footerHtml .= '<div class="col-md-'.$coln.'"><h4 class="footerTitle"><span>'.$fk->description.'</span></h4><div class="footerInfoArea"><ul>';
                    if(isset($settings['contact_adres']) != ""){$footerHtml .= '<li>Adres: '.$settings['contact_adres'].'</li>';}
                    if(isset($settings['contact_phone']) != ""){$footerHtml .= '<li>Tel: <a href="tel:'.$settings['contact_phone'].'" title="'.$settings['contact_phone'].'">'.$settings['contact_phone'].'</a></li>';}
                    if(isset($settings['contact_phone_two']) != ""){$footerHtml .= '<li>Tel 2: <a href="tel:'.$settings['contact_phone_two'].'" title="'.$settings['contact_phone_two'].'">'.$settings['contact_phone_two'].'</a></li>';}

                    if(isset($settings['contact_mail']) != ""){$footerHtml .= '<li>Mail: <a href="mailto:'.$settings['contact_mail'].'" title="'.$settings['contact_mail'].'">'.$settings['contact_mail'].'</a></li>';}
                    if(isset($settings['contact_mail_two']) != ""){$footerHtml .= '<li>Mail 2: <a href="mailto:'.$settings['contact_mail_two'].'" title="'.$settings['contact_mail_two'].'">'.$settings['contact_mail_two'].'</a></li>';}

                    if(isset($settings['contact_whatsapp']) != ""){$footerHtml .= '<li><a href="https://api.whatsapp.com/send?phone='.$settings['contact_whatsapp'].'" title="WhatsApp" class="whatsappLink"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp Hattı</a></li>';}

                    $footerHtml .= '</ul></div></div>';
                }elseif ($fk->value == "blog"){
                    $blogs = Blogs::all()->sortBy('must')->where('status',1);
                    $bgl = '';
                    foreach ($blogs as $blg){$bgl.='<li><a href="'.route('frontend.blog.detail',$blg->slug).'" title="'.$blg->title.'">'.$blg->title.'</a></li>';}
                    $footerHtml .= '<div class="col-md-'.$coln.'">
                               <h4 class="footerTitle"><span>'.$fk->description.'</span></h4>
                               <div class="footerInfoArea">
                                   <ul>'.$bgl.'</ul>
                               </div>
                           </div>';
                }
                elseif ($fk->value == "haberler"){
                    $blogs = News::all()->sortBy('must')->where('status',1);
                    $bgl = '';
                    foreach ($blogs as $blg){$bgl.='<li><a href="'.route('frontend.news.detail',$blg->slug).'" title="'.$blg->title.'">'.$blg->title.'</a></li>';}
                    $footerHtml .= '<div class="col-md-'.$coln.'">
                               <h4 class="footerTitle"><span>'.$fk->description.'</span></h4>
                               <div class="footerInfoArea">
                                   <ul>'.$bgl.'</ul>
                               </div>
                           </div>';
                }
                elseif ($fk->value == "sayfalar"){
                    $pages = Pages::all()->sortBy('must')->where('status',1)->where('footer',1);
                    $pgl = '';
                    foreach ($pages as $psg){$pgl.='<li><a href="'.route('frontend.page.detail',$psg->slug).'" title="'.$psg->title.'">'.$psg->title.'</a></li>';}
                    $footerHtml .= '<div class="col-md-'.$coln.'">
                               <h4 class="footerTitle"><span>'.$fk->description.'</span></h4>
                               <div class="footerInfoArea">
                                   <ul>'.$pgl.'</ul>
                               </div>
                           </div>';
                }
                elseif ($fk->value == "urunler"){
                    $pcat = Productcategories::all()->sortBy('must')->take(6)->where('status',1);
                    $pgl = '';
                    foreach ($pcat as $psg){$pgl.='<li><a href="'.route('frontend.procat.index',[$psg->id,$psg->slug]).'" title="'.$psg->title.'">'.$psg->title.'</a></li>';}
                    $footerHtml .= '<div class="col-md-'.$coln.'">
                               <h4 class="footerTitle"><span>'.$fk->description.'</span></h4>
                               <div class="footerInfoArea">
                                   <ul>'.$pgl.'</ul>
                               </div>
                           </div>';
                }
            }elseif ($fk->type == "ckeditor"){
                $footerHtml .= '<div class="col-md-'.$coln.'">
                               <h4 class="footerTitle"><span>'.$fk->description.'</span></h4>
                               <div class="footerInfoText">
                                   '.$fk->value.'
                               </div>
                           </div>';
            }
        }
        $settings['footerHtml'] = $footerHtml;

        View::share($settings);

        return $next($request);
    }
}

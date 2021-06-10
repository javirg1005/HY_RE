import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { LoginFormComponent } from './components/login-form/login-form.component';
import { SignupFormComponent } from './components/signup-form/signup-form.component';
//import { MainPageComponent } from './components/main-page/main-page.component';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
//import { CookieService } from 'ngx-cookie-service';
import { MainpageComponent } from './components/mainpage/mainpage.component';
import { AuthHeaderInterceptor } from './shared/auth-header.interceptor';
import { FavoritosComponent } from './components/favoritos/favoritos.component';
import { OfertasComponent } from './components/ofertas/ofertas.component';
import { InfoComponent } from './components/info/info.component';
import { ComboboxComponent } from './components/combobox/combobox.component';
import { OfertastrabajoComponent } from './components/ofertastrabajo/ofertastrabajo.component';
import { InfojobsComponent } from './components/infojobs/infojobs.component';
import { NgxPaginationModule } from 'ngx-pagination';
import { CheckpointComponent } from './components/checkpoint/checkpoint.component';


const rutas: Routes = [
  {
    path: '', pathMatch:'full', redirectTo: 'Mainpage'
  },
  {
    path: 'Mainpage', component: MainpageComponent
  },
  {
    path: 'SignupForm', component: SignupFormComponent
  },
  {
    path: 'LoginForm', component: LoginFormComponent
  },
  {
    path: 'Favoritos', component: FavoritosComponent
  },
  {
    path: 'Info', component: InfoComponent
  },
  {
    path: 'Infojob', component: InfojobsComponent
  },
  {
    path: 'Ofertas', component: OfertasComponent
  },
  {
    path: 'Ofertas_Trabajo', component: OfertastrabajoComponent
  },
  {
    path: 'combobox', component: ComboboxComponent
  }, 
  {
    path: 'checkpoint', component: CheckpointComponent
  }
]

@NgModule({
  declarations: [
    AppComponent,
    LoginFormComponent,
    SignupFormComponent,
    //MainPageComponent,
    MainpageComponent,
    FavoritosComponent,
    OfertasComponent,
    InfoComponent,
    ComboboxComponent,
    OfertastrabajoComponent,
    InfojobsComponent,
    CheckpointComponent,
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(rutas, {
      enableTracing: true, //para un mejor debug
    }),
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    NgxPaginationModule,
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: AuthHeaderInterceptor,
      multi: true
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

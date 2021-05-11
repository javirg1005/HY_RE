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


const rutas: Routes = [
  {
    path: '', pathMatch:'full', redirectTo:  'Mainpage'
  },
  {
    path: 'Mainpage', component: MainpageComponent
  },
  {
    path: 'SignupForm', component: SignupFormComponent
  },
  {
    path: 'LoginForm', component: LoginFormComponent
  }
]

@NgModule({
  declarations: [
    AppComponent,
    LoginFormComponent,
    SignupFormComponent,
    //MainPageComponent,
    MainpageComponent,
    FavoritosComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(rutas, {
      enableTracing: true, //para un mejor debug
    }),
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
/*    ,CookieService*/
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
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

//Rutas para moverse entre ventanas

import { AppComponent } from './app.component';
import { LoginFormComponent } from './components/login-form/login-form.component';
import { SignupFormComponent } from './components/signup-form/signup-form.component';
//import { MainPageComponent } from './components/main-page/main-page.component';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
//import { CookieService } from 'ngx-cookie-service';
import { MainpageComponent } from './components/mainpage/mainpage.component';


const rutas: Routes = [
  {
    path: '', pathMatch:'full', redirectTo:  'Mainpage'
  },
  {
    path: 'Mainpage', component: MainpageComponent,
    children: [   
      {
        path: 'SignupForm', component: SignupFormComponent
      },
      {
        path: 'LoginForm', component: LoginFormComponent
      }
    ]
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
    MainpageComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(rutas, {
      enableTracing: true, //para un mejor debug
    }),
    FormsModule,
    HttpClientModule
/*    ,CookieService*/
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

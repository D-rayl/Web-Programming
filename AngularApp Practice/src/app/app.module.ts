import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";
import { TopNavbarComponent } from "./top-navbar/top-navbar.component";
import { HeaderComponent } from "./header/header.component";
import { LeftNavbarComponent } from "./left-navbar/left-navbar.component";
import { MainComponent } from "./main/main.component";
import { RightArticleComponent } from "./right-article/right-article.component";
import { FooterComponent } from "./footer/footer.component";
import { AlertComponent } from "./alerts/directives/alert.component";
import { AlertService } from "./alerts/services/alert.service";

@NgModule({
  declarations: [
    AppComponent,
    TopNavbarComponent,
    HeaderComponent,
    LeftNavbarComponent,
    MainComponent,
    RightArticleComponent,
    FooterComponent,
    AlertComponent
  ],
  imports: [BrowserModule, AppRoutingModule],
  providers: [AlertService],
  bootstrap: [AppComponent]
})
export class AppModule {}

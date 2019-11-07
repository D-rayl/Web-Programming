import { Injectable } from "@angular/core";
import { HttpClient, HttpErrorResponse } from "@angular/common/http";
import { Person } from "./app/person";
import { Observable, throwError } from "rxjs";
import { catchError } from "rxjs/operators";

@Injectable()
export class Service {
  private _url: string = "./assets/data.json";

  constructor(private http: HttpClient) {}
  getPeople(): Observable<Person[]> {
    return this.http
      .get<Person[]>(this._url)
      .pipe(catchError(this.handleErrors));
  }

  handleErrors(error: HttpErrorResponse) {
    return throwError(error.message || "Request Error!");
  }

  //Another method for handling error
  private log(message: string) {
    console.log(message + "SHIT!");
  }
  private handleError<T>(operation = "operation", result?: T) {
    return (error: any): Observable<T> => {
      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead

      // TODO: better job of transforming error for user consumption
      this.log(`${operation} failed: ${error.message}`);
      return;
    };
  }
}

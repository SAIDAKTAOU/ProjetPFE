package com.android.projet.alzheimer.MyRequest;

import android.content.Context;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.NetworkError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by said on 6/11/2018.
 */

public class MyRquest {
    private Context context;
    private RequestQueue queue;

    public MyRquest(Context context, RequestQueue queue) {
        this.context = context;
        this.queue = queue;
    }
   public void location(final String latitude,final String longitude, final String pseudo){
       final String url = "http://192.168.1.185/projet/location.php";
StringRequest request=new StringRequest(Request.Method.POST,url, new Response.Listener<String>() {
    @Override
    public void onResponse(String response) {

        Log.d("APP",response);



    }
}, new Response.ErrorListener() {
    @Override
    public void onErrorResponse(VolleyError error) {


    }
}){
    @Override

    protected Map<String,String> getParams() throws AuthFailureError {

        Map<String,String> map = new HashMap<>();
        map.put("latitude",latitude);
        map.put("longitude",longitude);
        map.put("pseudo",pseudo);


        return map;
    }
};
       queue.add(request);


   }



    public void register(final String pseudo, final String email, final String password, final String password2, final RegiterCllback callback){

        String url = "http://192.168.1.185/projet/test_users.php";

        StringRequest request = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d("APP",response);
                Map<String,String> errors =new HashMap<>();
                try {
                    JSONObject json = new JSONObject(response);
                    Boolean error = json.getBoolean("error");
                    if (!error) {
                        //línscription est bien
                        callback.onSuccess("vous etes bien inscrit");
                    } else {
                        JSONObject messages = json.getJSONObject("message");
                        if (messages.has("pseudo")) {
                            errors.put("pseudo", messages.getString("pseudo"));
                        }
                        if (messages.has("email")) {
                            errors.put("email", messages.getString("email"));


                        }
                        if (messages.has("password")) {
                            errors.put("password", messages.getString("password"));
                        }
                        callback.inputErrors(errors);
                    }
                } catch (JSONException e){
                    e.printStackTrace();
                }




            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                if(error instanceof NetworkError){
                    callback.onError("Impossible de se connecte");
                }else if(error instanceof VolleyError){
                    callback.onError("une error s'est produite");

                }

            }
        }){
            @Override

            protected Map<String, String> getParams() throws AuthFailureError {

                Map<String,String> map = new HashMap<>();
                map.put("pseudo", pseudo);
                map.put("email", email);
                map.put("password", password);
                map.put("password2", password2);

                return map;
            }
        };

        queue.add(request);

    }
    public interface RegiterCllback{
        void onSuccess(String message);
        void inputErrors(Map<String,String> errors);
        void onError(String message);
    }
    public void connection(final String pseudo,final String password,final LoginCallback callback){
        String url = "http://192.168.1.185/projet/login.php";

        StringRequest request = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject json =new JSONObject(response);
                    Boolean error=json.getBoolean("error");
                    if(!error){
                        String pseudo=json.getString("pseudo");
                        callback.onSuccess(pseudo);
                    }else{
                        callback.onError(json.getString("message"));
                    }
                } catch (JSONException e){
                    callback.onError("une error s'est produite");
                    e.printStackTrace();
                }




            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                if(error instanceof NetworkError){
                    callback.onError("Impossible de se connecte");
                }else if(error instanceof VolleyError){
                    callback.onError("une error s'est produite");

                }

            }
        }){
            @Override

            protected Map<String, String> getParams() throws AuthFailureError {

                Map<String, String> map = new HashMap<>();
                map.put("pseudo", pseudo);

                map.put("password", password);


                return map;
            }
        };

        queue.add(request);


    }
    public interface LoginCallback{
        void onSuccess(String pseudo);
        void onError(String message);
    }
}

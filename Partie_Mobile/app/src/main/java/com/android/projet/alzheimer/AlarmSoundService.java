package com.android.projet.alzheimer;

import android.app.Service;

import android.content.Intent;

import android.media.MediaPlayer;

import android.os.IBinder;

import android.support.annotation.Nullable;



public class AlarmSoundService extends Service {

    private MediaPlayer mediaPlayer;



    @Nullable

    @Override

    public IBinder onBind(Intent intent) {

        return null;

    }



    @Override

    public void onCreate() {

        super.onCreate();

        //Start media player

        mediaPlayer = MediaPlayer.create(this, R.raw.r2d2); //tukar nma audio kt r2d2 tu

        mediaPlayer.start();

        mediaPlayer.setLooping(false);//set looping true to run it infinitely

    }




    @Override

    public void onDestroy() {

        super.onDestroy();

        //On destory stop and release the media player

        if (mediaPlayer != null && mediaPlayer.isPlaying()) {

            mediaPlayer.stop();

            mediaPlayer.reset();

            mediaPlayer.release();

        }

    }



}

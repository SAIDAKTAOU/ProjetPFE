package com.android.projet.alzheimer;

import android.content.BroadcastReceiver;
import android.content.ComponentName;
import android.content.Context;
import android.content.Intent;
import android.os.Vibrator;

import static android.support.v4.content.WakefulBroadcastReceiver.startWakefulService;

/**
 * Created by said on 6/16/2018.
 */

public class NotificationReceiver extends BroadcastReceiver {
    @Override
    public void onReceive(Context context, Intent intent) {

        ComponentName comp = new ComponentName(context.getPackageName(),

                NotificationService.class.getName());

        startWakefulService(context, (intent.setComponent(comp)));
        Vibrator vibrator = (Vibrator) context.getSystemService(context.VIBRATOR_SERVICE);
        vibrator.vibrate(2000);
        context.startService(new Intent(context, AlarmSoundService.class));



    }
}

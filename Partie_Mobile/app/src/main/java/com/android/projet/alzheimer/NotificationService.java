package com.android.projet.alzheimer;

import android.app.IntentService;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.support.annotation.Nullable;
import android.support.v4.app.NotificationCompat;

import static com.android.projet.alzheimer.App.CHANNEL_1_ID;

/**
 * Created by said on 6/16/2018.
 */

public class NotificationService extends IntentService {
    private NotificationManager alarmNotificationManager;
    public NotificationService() {

        super("AlarmNotificationService");

    }
    @Override
    protected void onHandleIntent(@Nullable Intent intent) {
        //get edittext custom message value from MainActivity

        String notify1 = intent.getExtras().getString("msg");
        String notify2 = intent.getExtras().getString("titre");

        //Send notification

        sendNotification(notify1,notify2);
    }

    private void sendNotification(String notify1, String notify2) {
        alarmNotificationManager = (NotificationManager) this

                .getSystemService(Context.NOTIFICATION_SERVICE);

        Intent activityIntent = new Intent(this, MainActivity.class);
        PendingIntent contentIntent = PendingIntent.getActivity(this, 0, activityIntent, 0);



        Notification notification = new NotificationCompat.Builder(this, CHANNEL_1_ID)
                .setSmallIcon(R.drawable.ic_one)
                .setContentTitle(notify2)
                .setContentText(notify1)
                .setPriority(NotificationCompat.PRIORITY_HIGH)
                .setCategory(NotificationCompat.CATEGORY_MESSAGE)
                .setContentIntent(contentIntent)
                .setAutoCancel(true)
                .setOnlyAlertOnce(true)

                .build();
        alarmNotificationManager.notify(1, notification);
    }
}
